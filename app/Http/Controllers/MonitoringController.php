<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


/**
     * ################################################
     *      THIS IS SAMPLE CONTROLLER
     *  mostly used to display UI implementation.
     *  the main UI for SamBoilerplate is from the Sneat Theme,
     *  check or license about them (to remove credit in footer) in their website
     * ################################################
     */
class MonitoringController extends Controller
{

    private $mainBreadcrumbs;

    /**
     * =============================================
     *      constructor
     * =============================================
     */

    public function __construct()
    {

        // Store common breadcrumbs in the constructor
        $this->mainBreadcrumbs = [
            'Admin' => route('admin.user.index'),
            'Monitoring' => route('admin.user.index'),
        ];
    }

    /**
     * =============================================
     *      show sample page for ringkasan
     * =============================================
     */
    public function ringkasan(Request $request){

        $breadcrumbs = array_merge($this->mainBreadcrumbs, ['Ringkasan' => null]);

        return view('admin.pages.monitoring.ringkasan', compact('breadcrumbs'));

    }

    /**
     * =============================================
     *  show sample page for rutinan
     * =============================================
     */
    public function rutinan(Request $request){

        $breadcrumbs = array_merge($this->mainBreadcrumbs, ['Rutinan' => null]);

        return view('admin.pages.monitoring.rutinan', compact('breadcrumbs'));

    }

    /**
     * =============================================
     * show sample page for pengawasan
     * =============================================
     */
    public function pengawasan(Request $request){

        $breadcrumbs = array_merge($this->mainBreadcrumbs, ['Pengawasan' => null]);

        return view('admin.pages.monitoring.pengawasan', compact('breadcrumbs'));

    }


    /**
     * =============================================
     *  show sample page for susenas
     * =============================================
     */
    public function susenas(Request $request){

        $breadcrumbs = array_merge($this->mainBreadcrumbs, ['Susenas' => null]);

        return view('admin.pages.monitoring.susenas', compact('breadcrumbs'));

    }

    /**
     * =============================================
     *  show sample page for seruti
     * =============================================
     */
    public function seruti(Request $request){

        $breadcrumbs = array_merge($this->mainBreadcrumbs, ['Seruti' => null]);

        return view('admin.pages.monitoring.seruti', compact('breadcrumbs'));

    }

    /**
     * =============================================
     *      show sample page for sakernas
     * =============================================
     */
    public function sakernas(Request $request){

        $breadcrumbs = array_merge($this->mainBreadcrumbs, ['Sakernas' => null]);

        return view('admin.pages.monitoring.sakernas', compact('breadcrumbs'));

    }

    /**
     * =============================================
     *      show sample page for tracking
     * =============================================
     */
    public function tracking(Request $request){

        $breadcrumbs = array_merge($this->mainBreadcrumbs, ['Tracking' => null]);

        return view('admin.pages.monitoring.sakernas', compact('breadcrumbs'));

    }

}