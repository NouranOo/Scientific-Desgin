<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Repository\PublicRepository;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        $contact=PublicRepository::findAll('ContactUs');
        return view('admin.contact',compact('contact'));
    }

}
