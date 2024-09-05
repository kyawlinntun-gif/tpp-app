<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = [
            [
              "title" => "The Future of AI: Trends to Watch in 2024",
              "author" => "Jane Doe"
            ],
            [
              "title" => "Sustainable Living: 10 Simple Tips for a Greener Life",
              "author" => "John Smith"
            ],
            [
              "title" => "The Rise of Remote Work: Benefits and Challenges",
              "author" => "Emily Johnson"
            ],
            [
              "title" => "Mastering the Art of Minimalism in 2024",
              "author" => "Michael Lee"
            ],
            [
              "title" => "Exploring Space: The Next Frontier for Humanity",
              "author" => "Sarah Thompson"
            ]
        ];

        return view('articles.index', compact('articles'));
    }
}
