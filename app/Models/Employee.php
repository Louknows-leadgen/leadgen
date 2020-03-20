<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{

	protected $fillable = [
		'person_id',
		'company_number',
		'bank_account',
		'cost_center_id',
		'cluster_id',
		'site_id',
		'job_id',
		'status',
		'company_id',
		'date_signed',
		'contract_id',
		'department_id',
		'employee_id',
		'jo_date',
		'nesting_date',
		'eval_period',
		'reprofile_date',
		'trng_ext_date',
		'start_date',
		'month_eval3',
		'month_eval5',
		'assoc_date',
		'consultant_date',
		'regularize_date',
		'medilink_id'
	];

    /*
    |---------------------
    |   Association
    |---------------------
    */
    public function person(){
    	return $this->belongsTo('App\Models\Person');
    }

    public function cluster(){
        return $this->belongsTo('App\Models\Cluster');
    }

    public function site(){
        return $this->belongsTo('App\Models\Site');
    }

    public function job(){
        return $this->belongsTo('App\Models\Job');
    }

    public function contract(){
        return $this->belongsTo('App\Models\Contract');
    }

    public function employee(){
        return $this->belongsTo('App\Models\Employee');
    }

    public function government_detail(){
        return $this->hasOne('App\Models\GovernmentDetail');
    }

    public function compensation(){
        return $this->hasOne('App\Models\Compensation');
    }

    public function cost_center(){
        return $this->belongsTo('App\Models\CostCenter');
    }

    public function company(){
        return $this->belongsTo('App\Models\Company');
    }

    public function department(){
        return $this->belongsTo('App\Models\Department');
    }

    public function health_insurances(){
        return $this->hasMany('App\Models\HealthInsurance');
    }

    /*
    |---------------------
    |   Mutators
    |---------------------
    */
    public function setJoDateAttribute($value){
        $date = date_create_from_format("m/d/Y",$value);
        $this->attributes['jo_date'] = date_format($date,"Y-m-d");
    }

    public function setDateSignedAttribute($value){
    	if(isset($value)){
	        $date = date_create_from_format("m/d/Y",$value);
	        $this->attributes['date_signed'] = date_format($date,"Y-m-d");
    	}
    }

    public function setNestingDateAttribute($value){
        if(isset($value)){
	        $date = date_create_from_format("m/d/Y",$value);
	        $this->attributes['nesting_date'] = date_format($date,"Y-m-d");
    	}
    }

    public function setEvalPeriodAttribute($value){
        if(isset($value)){
	        $date = date_create_from_format("m/d/Y",$value);
	        $this->attributes['eval_period'] = date_format($date,"Y-m-d");
    	}
    }

    public function setReprofileDateAttribute($value){
        if(isset($value)){
	        $date = date_create_from_format("m/d/Y",$value);
	        $this->attributes['reprofile_date'] = date_format($date,"Y-m-d");
    	}
    }

    public function setTrngExtDateAttribute($value){
    	if(isset($value)){
	        $date = date_create_from_format("m/d/Y",$value);
	        $this->attributes['trng_ext_date'] = date_format($date,"Y-m-d");
    	}
    }

    public function setStartDateAttribute($value){
    	if(isset($value)){
	        $date = date_create_from_format("m/d/Y",$value);
	        $this->attributes['start_date'] = date_format($date,"Y-m-d");
    	}
    }

    public function setMonthEval3Attribute($value){
    	if(isset($value)){
	        $date = date_create_from_format("m/d/Y",$value);
	        $this->attributes['month_eval3'] = date_format($date,"Y-m-d");
    	}
    }

    public function setMonthEval5Attribute($value){
    	if(isset($value)){
	        $date = date_create_from_format("m/d/Y",$value);
	        $this->attributes['month_eval5'] = date_format($date,"Y-m-d");
    	}
    }

    public function setAssocDateAttribute($value){
    	if(isset($value)){
	        $date = date_create_from_format("m/d/Y",$value);
	        $this->attributes['assoc_date'] = date_format($date,"Y-m-d");
    	}
    }

    public function setConsultantDateAttribute($value){
    	if(isset($value)){
	        $date = date_create_from_format("m/d/Y",$value);
	        $this->attributes['consultant_date'] = date_format($date,"Y-m-d");
    	}
    }

    public function setRegularizeDateAttribute($value){
    	if(isset($value)){
	        $date = date_create_from_format("m/d/Y",$value);
	        $this->attributes['regularize_date'] = date_format($date,"Y-m-d");
    	}
    }


    /*
    |---------------------
    |   Accessors
    |---------------------*/

    public function getDateSignedAttribute($value){
        return isset($value) ? $value : '';
    }

    public function getNestingDateAttribute($value){
        return isset($value) ? $value : '';
    }

    public function getTrngExtDateAttribute($value){
        return isset($value) ? $value : '';
    }

    public function getEvalPeriodAttribute($value){
        return isset($value) ? $value : '';
    }

    public function getReprofileDateAttribute($value){
        return isset($value) ? $value : '';
    }

    public function getStartDateAttribute($value){
        return isset($value) ? $value : '';
    }

    public function getAssocDateAttribute($value){
        return isset($value) ? $value : '';
    }

    public function getConsultantDateAttribute($value){
        return isset($value) ? $value : '';
    }

    public function getMonthEval3Attribute($value){
        return isset($value) ? $value : '';
    }

    public function getMonthEval5Attribute($value){
        return isset($value) ? $value : '';
    }

    public function getRegularizeDateAttribute($value){
        return isset($value) ? $value : '';
    }


    /*
    |---------------------
    |   Helpers
    |---------------------*/

    public static function generate_id($start_date){
        $rank = self::whereDate('start_date',$start_date)->count() + 1;
        $pos = explode('.',$rank / 1000);
        $month = date('m',strtotime($start_date));
        $year = date('Y',strtotime($start_date));

        $id = 'DCI-'.$year.$month.$pos[1]; 
  
        return $id;
    }

    public static function get_employee_id($employee_name){
    	$employee = DB::table('employees as e')
				       ->join('people as p','p.id', '=', 'e.person_id')
				       ->whereRaw("concat(p.first_name,' ',p.last_name) = ?",[$employee_name])
				       ->get('e.id as employee_id')
				       ->first();

		return isset($employee) ? $employee->employee_id : null;	       
    }

    public static function all_employees_name(){
        $employees = DB::table('employees as e')
                     ->join('people as p','p.id','=','e.person_id')
                     ->selectRaw("e.id,e.person_id,concat(p.first_name,' ',p.last_name) as name")
                     ->orderBy('name')
                     ->get();

        return $employees;
    }

    public static function search($skey, $dept_filter, $scope){
        $query = DB::table('employees as e')
                ->join('people as p','p.id','=','e.person_id')
                ->leftJoin('jobs as j', 'j.id', '=', 'e.job_id')
                ->where(function($q) use($dept_filter){
                    $q->where('e.department_id','=',$dept_filter)
                      ->orWhereRaw('? = 0',$dept_filter);
                  })
                ->where('e.status','=',$scope);

        if(!empty($skey))
            $query->whereRaw("concat(p.first_name,' ', p.last_name) LIKE ?",['%'.$skey.'%']);

        return $query->paginate(5,['e.id as employee_id','e.person_id','j.name as job_name','p.first_name','p.last_name','p.gender']);
    }


    /*
    |------------------------
    |     Custom Attributes
    |------------------------
    */

    // used to create custom attribute 'job_name'
    protected $appends = [
        'job_name',
        'full_name',
        'cost_name',
        'site_name',
        'cluster_name',
        'position_name',
        'company_name',
        'contract_name',
        'department_name',
        'supervisor'
    ];
    
    public function getJobNameAttribute(){
        return $this->job->name;
    }

    public function getFullNameAttribute(){
        $name = implode(' ',[$this->person->first_name,$this->person->last_name]);
        return $name;
    }

    public function getCostNameAttribute(){
        return isset($this->cost_center) ? $this->cost_center->cost_name : '';
    }

    public function getSiteNameAttribute(){
        return isset($this->site) ? $this->site->name : '';
    }

    public function getClusterNameAttribute(){
        return isset($this->cluster) ? $this->cluster->cluster_name : '';
    }

    public function getPositionNameAttribute(){
        return isset($this->job) ? $this->job->name : '';
    }

    public function getCompanyNameAttribute(){
        return isset($this->company) ? $this->company->company_name : '';
    }

    public function getContractNameAttribute(){
        return isset($this->contract) ? $this->contract->contract_name : '';
    }

    public function getDepartmentNameAttribute(){
        return isset($this->department) ? $this->department->department_name : '';
    }

    public function getSupervisorAttribute(){
        return isset($this->employee) ? $this->employee->person->name() : '';
    }

}
