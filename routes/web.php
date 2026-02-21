<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::livewire('/ep1', 'pages::meeting-notes');
Route::livewire('/ep2', 'pages::profile-settings');
Route::livewire('/ep3', 'pages::product-wizard');
Route::livewire('/ep4', 'pages::tag-input');
Route::livewire('/ep5', 'pages::infinite-scroll');
Route::livewire('/ep6', 'pages::notification-center');
Route::livewire('/ep7', 'pages::dynamic-search');
Route::livewire('/ep8', 'pages::kanban-board');
