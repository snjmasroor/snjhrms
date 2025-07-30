<?php

Route::middleware(['auth', 'role:admin'])->group(function () {
      Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
});

?>