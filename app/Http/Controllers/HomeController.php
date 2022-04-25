<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Mail\RequestMail;
use App\Models\Project;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('home');
    }

    /**
     * @param Request $request
     * @return string
     */
    public function sendRequest(Request $request): string
    {
        $attachments = $request->attachments;
        $photos = $request->photos;
        $floorPlans = $request->floor_plans;

        $data = $request->only([
            'address',
            'comment',
            'construction_year',
            'email',
            'surface',
            'is_leasehold',
            'phone_number',
            'postal_code',
            'price',
            'room',
            'state',
            'type',
            'floors',
            'apartment_count',
            'is_declaration_of_division',
            'is_development_possible',
        ]);

        DB::transaction(function () use ($data, $attachments, $photos, $floorPlans) {
            $project = Project::create($data);
            ImageService::saveImages($attachments, 'attachments', $project);
            ImageService::saveImages($photos, 'photos', $project);
            ImageService::saveImages($floorPlans, 'floor_plans', $project);

            Mail::to(config('mail.contact_email'))
                ->locale('de')
                ->send(new RequestMail($project));
        });

        return 'Success';
    }

    /**
     * @param Request $request
     * @return string
     */
    public function sendContactMessage(Request $request): string
    {
        $data = $request->only([
            'name',
            'email',
            'message'
        ]);


        Mail::to(config('mail.contact_email'))
            ->locale('de')
            ->send(new ContactMail($data['name'], $data['email'], $data['message']));

        return 'Success';
    }
}
