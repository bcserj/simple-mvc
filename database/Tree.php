<?php

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('trees', function ($table) {
    $table->increments('id');
    $table->string('name');
    $table->unsignedInteger('parent_id')->nullable();
});