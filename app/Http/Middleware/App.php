<?php namespace App\Http\Middleware;

use App\Repositories\UploadRepository;
use Carbon\Carbon;
use Closure;

class App
{
    protected $languages = ['es'];

    protected $uploadRepository;

    public function handle($request, Closure $next)
    {
        
        if (auth()->check()) {
            app()->setLocale(setting('language', app()->getLocale()));
        } else {
            app()->setLocale($request->getPreferredLanguage($this->languages));
        }

        try {
            Carbon::setLocale(app()->getLocale());
           
        } catch (\Exception $exception) { }

        return $next($request);
    }

}