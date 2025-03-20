<?php

namespace App\Providers;

use App\Models\ReceiptAccount;
use Illuminate\Support\ServiceProvider;
use App\Repository\Doctors\DoctorRepository;
use App\Repository\Finance\ReceiptRepository;
use App\Repository\Patients\PatientRepository;
use App\Repository\Sections\SectionRepository;
use App\Repository\Ambulances\AmbulanceRepository;
use App\Repository\Insurances\InsuranceRepository;
use App\Repository\Services\SingleServiceRepository;
use App\interfaces\Doctors\DoctorRepositoryInterface;
use App\interfaces\Finance\PaymentRepositoryInterface;
use App\interfaces\Finance\ReceiptRepositoryInterface;
use App\interfaces\Patients\PatientRepositoryInterface;
use App\interfaces\Sections\SectionRepositoryInterface;
use App\interfaces\Ambulances\AmbulanceRepositoryInterface;
use App\interfaces\Doctor_dashboard\DiagnosisRepositoryInterface;
use App\interfaces\Doctor_dashboard\InvoicesRepositoryInterface;
use App\interfaces\Insurances\InsuranceRepositoryInterface;
use App\interfaces\Services\SingleServiceRepositoryInterface;
use App\Repository\Doctor_dashboard\DiagnosisRepository;
use App\Repository\Doctor_dashboard\InvoicesRepository;
use App\Repository\Finance\PaymentRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(SectionRepositoryInterface::class,SectionRepository::class);
        $this->app->bind(DoctorRepositoryInterface::class,DoctorRepository::class);
        $this->app->bind(SingleServiceRepositoryInterface::class,SingleServiceRepository::class);
        $this->app->bind(InsuranceRepositoryInterface::class,InsuranceRepository::class);
        $this->app->bind(AmbulanceRepositoryInterface::class,AmbulanceRepository::class);
        $this->app->bind(PatientRepositoryInterface::class,PatientRepository::class);
        $this->app->bind(ReceiptRepositoryInterface::class,ReceiptRepository::class);
        $this->app->bind(PaymentRepositoryInterface::class,PaymentRepository::class);
        $this->app->bind(InvoicesRepositoryInterface::class,InvoicesRepository::class);
        $this->app->bind(DiagnosisRepositoryInterface::class,DiagnosisRepository::class);

     
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
