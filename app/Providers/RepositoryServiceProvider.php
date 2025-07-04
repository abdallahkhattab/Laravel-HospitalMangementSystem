<?php

namespace App\Providers;

use App\Models\ReceiptAccount;
use Illuminate\Support\ServiceProvider;
use App\Repository\Doctors\DoctorRepository;
use App\Repository\Finance\PaymentRepository;
use App\Repository\Finance\ReceiptRepository;
use App\Repository\Patients\PatientRepository;
use App\Repository\Sections\SectionRepository;
use App\Repository\Ambulances\AmbulanceRepository;
use App\Repository\Insurances\InsuranceRepository;
use App\Repository\Doctor_dashboard\RaysRepository;
use App\Repository\Services\SingleServiceRepository;
use App\interfaces\Doctors\DoctorRepositoryInterface;
use App\Repository\RayEmployee\RayEmployeeRepository;
use App\interfaces\Finance\PaymentRepositoryInterface;
use App\interfaces\Finance\ReceiptRepositoryInterface;
use App\Interfaces\Lab\RayEmployeesRepositoryInterface;
use App\interfaces\Patients\PatientRepositoryInterface;
use App\interfaces\Sections\SectionRepositoryInterface;
use App\Repository\Doctor_dashboard\InvoicesRepository;
use App\Repository\Doctor_dashboard\DiagnosisRepository;
use App\interfaces\Ambulances\AmbulanceRepositoryInterface;
use App\interfaces\Insurances\InsuranceRepositoryInterface;
use App\Repository\Doctor_dashboard\LaboratoriesRepository;
use App\interfaces\Doctor_dashboard\RaysRepositoryInterface;
use App\interfaces\Services\SingleServiceRepositoryInterface;
use App\interfaces\Doctor_dashboard\InvoicesRepositoryInterface;
use App\interfaces\Doctor_dashboard\DiagnosisRepositoryInterface;
use App\interfaces\Doctor_dashboard\LaboratoriesRepositoryInterface;
use App\Repository\Ray_Employee_Dashboard\invoices\InvoiceRepository;
use App\Repository\LaboratorieEmployee\LaboratorieEmployeeRepositrory;
use App\interfaces\LaboratoriesEmployess\LaboratoriesEmployeesRepositoryInterface;
use App\interfaces\Ray_Employee_Dashboard\Invoices\InvoicesRepositoryInterface as InvoicesInvoicesRepositoryInterface;
use App\Repository\Patient_Dashboard\PatientRepository\PatientRepository as PatientRepositoryPatientRepository;

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
        $this->app->bind(RaysRepositoryInterface::class,RaysRepository::class);
        $this->app->bind(LaboratoriesRepositoryInterface::class,LaboratoriesRepository::class);
        $this->app->bind(RayEmployeesRepositoryInterface::class,RayEmployeeRepository::class);
        $this->app->bind(InvoicesInvoicesRepositoryInterface::class,InvoiceRepository::class);
        $this->app->bind(LaboratoriesEmployeesRepositoryInterface::class,LaboratorieEmployeeRepositrory::class);
        $this->app->bind(PatientRepositoryPatientRepository::class,PatientRepositoryPatientRepository::class);
        
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
