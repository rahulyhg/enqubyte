<?php

namespace App\Models;

use App\User;
use App\Models\Store;
use App\Models\Enquiry;
use App\Models\Product;
use App\Models\Visitor;
use App\Models\Employee;
use App\Models\Customer;
use App\Models\InvoiceItem;
use App\Models\RecordPayment;
use App\Models\SalesmanIncentive;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'sr_no', 'customer_id', 'company_id', 'employee_id', 'store_id', 'enquiry_id', 'due_date', 'invoice_date', 'sub_tot_amt', 'grand_total', 'status', 'discount_type', 'discount', 'remaining_amount','taxes'
    ];

    public function company()
    {
        return $this->belongsTo(User::class, 'company_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function invoiceitems()
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function enquiry()
    {
        return $this->belongsTo(Enquiry::class);
    }

    public function visitor()
    {
        return $this->belongsTo(Visitor::class, 'customer_id');
    }

    public function customer()
    {
        return $this->belongsTo(Visitor::class, 'customer_id');
    }

    public function payments()
    {
        return $this->hasMany(RecordPayment::class);
    }

    public function incentive()
    {
        return $this->hasOne(SalesmanIncentive::class);
    }

    public function getTaxesAttribute()
    {
        return json_decode($this->attributes['taxes']);
    }
}
