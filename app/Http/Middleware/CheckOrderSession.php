<?php

namespace App\Http\Middleware;

use Closure;
use App\ModelsEtablishment;

class CheckOrderSession
{
    
    private $onlyTypeToBeAllow=[
	'App\ModelsFree',
	'App\ModelsEntreprise',
	'App\ModelsStandard'
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {
	if(!session()->has('orderForType'))
		return redirect('/');

	if(!in_array(session()->get('orderForType'),
		        $this->onlyTypeToBeAllow))	
		return redirect('/');

        return $next($request);
    }
}
