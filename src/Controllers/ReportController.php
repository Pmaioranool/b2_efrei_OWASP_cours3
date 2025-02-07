<?php

namespace App\Controllers;

use App\Controllers\CoreController;
use App\Models\ReportModel;

class ReportController extends CoreController
{
    public function GetReport()
    {
        $this->render('Reports/report');
    }

    public function POSTReport()
    {
        $this->isConnected();
        $id_user = $_SESSION['user']['id'];
        $message = htmlspecialchars($_POST['message']);
        $title = htmlspecialchars($_POST['title']);
        $report = new ReportModel(null, $id_user, $title, $message);
        $report->createReport();
        $this->redirect('report', 'Votre signalement a bien été pris en compte');
    }

    public function GethandleReport($matches)
    {
        $this->isAdmin();
        $id = $matches['id'];
        $report = new ReportModel($id);
        $report->getReport();
        $this->render('Reports/handleReport', ['report' => $report]);
    }

    public function POSThandleReport($matches)
    {
        $this->isAdmin();
        $id = $matches['id'];
        $report = new ReportModel();
        $report->handleReport();
        $this->redirect("report/$id", 'Le signalement a bien été traité');
    }
}