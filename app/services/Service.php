<?php

namespace App\Services;

/**
 * The Service abstract class is intended for extension only
 * and cannot be instantiated directly from other classes.
 * This service is designed for utilizing repository actions,
 * and you can create method helpers related to service functionality.
 * Ex functions: (DataTable Mapping, Response Mapping, etc..).
 */
abstract class Service
{
    /**
     * Returns the repository instance.
     */
    protected $repository;
}