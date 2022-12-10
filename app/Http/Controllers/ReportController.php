<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\MedicalRecord;
use App\Models\Transaction;

class ReportController extends Controller
{
    public function medical($period)
    {
        $now = Carbon::now();

        if ($period == 'weekly') {
            $medicalRecords = MedicalRecord::whereBetween('created_at', [
                $now->startOfWeek(Carbon::SUNDAY)->format('Y-m-d'),
                $now->endOfWeek(Carbon::SATURDAY)->format('Y-m-d'),
            ])->get();
            $period = 'Weekly';
        } elseif ($period == 'monthly') {
            $medicalRecords = MedicalRecord::whereMonth('created_at', date('m'))->get();
            $period = 'Monthly';
        } elseif ($period == 'annually') {
            $medicalRecords = MedicalRecord::whereYear('created_at', date('Y'))->get();
            $period = 'Annual';
        } else {
            $medicalRecords = MedicalRecord::whereDay('created_at', date('d'))->get();
            $period = 'Today';
        }

        return view('admin.reports.medical', compact('medicalRecords', 'period'));
    }

    public function sales($period)
    {
        $now = Carbon::now();

        if ($period == 'weekly') {
            $transactions = Transaction::whereBetween('created_at', [
                $now->startOfWeek(Carbon::SUNDAY)->format('Y-m-d'),
                $now->endOfWeek(Carbon::SATURDAY)->format('Y-m-d'),
            ])->get();
            $period = 'Weekly';
        } elseif ($period == 'monthly') {
            $transactions = Transaction::whereMonth('created_at', date('m'))->get();
            $period = 'Monthly';
        } elseif ($period == 'annually') {
            $transactions = Transaction::whereYear('created_at', date('Y'))->get();
            $period = 'Annual';
        } else {
            $transactions = Transaction::whereDay('created_at', date('d'))->get();
            $period = 'Today';
        }

        return view('admin.reports.sales', compact('transactions', 'period'));
    }
}
