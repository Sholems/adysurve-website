<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AcademyController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ConsultationBookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/services/{slug}', [ServicesController::class, 'show'])->name('services.show');
Route::get('/projects', [ProjectsController::class, 'index'])->name('projects');
Route::get('/projects/{slug}', [ProjectsController::class, 'show'])->name('projects.show');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/megabyte-academy/network-security-training', [AcademyController::class, 'networkSecurity'])->name('academy.network-security');
Route::get('/megabyte-academy/cctv-installation-surveillance-security-training', [AcademyController::class, 'cctvSecurity'])->name('academy.cctv-security');
Route::get('/megabyte-academy/solar-renewable-energy-design-installation-training', [AcademyController::class, 'solarRenewableEnergy'])->name('academy.solar-renewable-energy');
Route::get('/megabyte-academy/it-essentials-for-beginners-training', [AcademyController::class, 'itEssentials'])->name('academy.it-essentials');
Route::get('/megabyte-academy/graphic-design-media-communication-training', [AcademyController::class, 'graphicDesignMedia'])->name('academy.graphic-design-media');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->middleware('throttle:contact')->name('contact.store');
Route::post('/free-consultation', [ConsultationBookingController::class, 'store'])->middleware('throttle:consultation')->name('consultation.store');
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/privacy-policy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
