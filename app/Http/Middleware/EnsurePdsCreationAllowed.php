<?php

namespace App\Http\Middleware;

use App\Enums\SubmissionStatus;
use App\Traits\HasFlashMessage;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsurePdsCreationAllowed
{
    use HasFlashMessage;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Fetch the authenticated user
        $user = Auth::user();

        // Check if user has an "UNDER_REVIEW" entry
        $underReviewEntry = $user->entries()->where('status', SubmissionStatus::UNDER_REVIEW)->exists();

        // Check if user has an "APPROVED" entry
        $approvedEntry = $user->entries()->where('status', SubmissionStatus::APPROVED)->exists();

        if($underReviewEntry && !$approvedEntry){

            $this->flashMessage('You cannot create a new PDS while your current entry is under review.', 'error');

            session()->flash('disable_pds_entry', true);
            
            return redirect()->route('employee.dashboard');
        }

        return $next($request);
    }
}
