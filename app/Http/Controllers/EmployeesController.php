<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Incentive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Notifications\NewEmployee;
use App\Exports\EmployeesExport;
use Maatwebsite\Excel\Facades\Excel;

class EmployeesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'subscribed']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = auth()->user()->stores;
        $employees = auth()->user()->employees()->get();
        $incentives = auth()->user()->incentives;
        return view('employees.index', compact('stores', 'employees', 'incentives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newData = $request->all();
        if(request()->has('photo'))
        {
            $newData['photo'] = request()->file('photo')->store(
                '/uploads/employees/'. auth()->id(). '/avatar', 'public'
            );
        }
        if(request()->has('verification_doc'))
        {
            $newData['verification_doc'] = request()->file('verification_doc')->store(
                '/uploads/employees/'. auth()->id(). '/document', 'public'
            );
        }

        $newData['company_id'] = auth()->id();
        $password = $newData['password'];
        $newData['password'] = Hash::make($newData['password']);
        $employee = auth()->user()->employees()->create($newData);

        if($request->wantsJson())
        {
            return response($employee, 200);
        }
        $employee['password'] = $password;
        // dd(auth()->user());
        // $employee->notify(new NewEmployee($employee, auth()->user()));

        flash('Employee added successfully!')->success();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {

        $enquiries = $employee->enquiries;
        $enquiriesCount = $enquiries->count();
        $invoices = $employee->invoices;
        $invoicesCount = $invoices->count();
        $totalSale = $invoices->sum('grand_total');
        $remaining = $invoices->sum('remaining_amount');

        return view('employees.show', compact('employee', 'enquiries', 'enquiriesCount', 'invoicesCount', 'invoices', 'totalSale', 'remaining'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $newData = $request->all();
        if(request()->has('photo'))
        {
            $newData['photo'] = request()->file('photo')->store(
                '/uploads/employees/'. auth()->id(). '/avatar', 'public'
            );
        }
        if(request()->has('verification_doc'))
        {
            $newData['verification_doc'] = request()->file('verification_doc')->store(
                '/uploads/employees/'. auth()->id(). '/document', 'public'
            );
        }
        $employee->update($newData);
        flash('Employee updated successfully!')->success();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        flash('Employee deleted successfully!')->error();
        return back();
    }

    public function emailIsAvailable($email)
    {
        $isAvailable = !Employee::where('email', $email)->exists();
        if ($isAvailable) {
            return response(['status'=>true], 200);
        }else{
            return response(['status'=>false], 404);
        }
    }

    public function exportToExcel()
    {
        return Excel::download(new EmployeesExport, 'employees.xlsx');
    }

    public function exportToPDF(){
        /*return view('exports.employees', [
            'employees' => auth()->user()->employees
        ]);*/
         return Excel::download(new EmployeesExport(), 'employees.pdf',  \Maatwebsite\Excel\Excel::DOMPDF);
    }

    public function exportToCSV(){
         return Excel::download(new EmployeesExport(), 'employees.csv',  \Maatwebsite\Excel\Excel::CSV);
    }
}
