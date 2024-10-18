<?php

namespace App\Controllers;

use App\Models\EntreprisesModel;
use CodeIgniter\Controller;

class EntrepriseController extends Controller
{
    // Méthode pour afficher la liste des entreprises
    public function index()
    {
        $entrepriseModel = new EntreprisesModel();

        // Récupération de toutes les entreprises
        $entreprises = $entrepriseModel->findAll();

        // Débogage (à supprimer après vérification)
        // echo '<pre>'; var_dump($entreprises); echo '</pre>'; die();

        // Envoyer les données à la vue entreprise_list
        return view('entreprise_list', ['entreprises' => $entreprises]);
    }

    // Méthode pour afficher les détails d'une entreprise
    public function show($id)
    {
        $entrepriseModel = new EntreprisesModel();

        // Récupération de l'entreprise par ID
        $entreprise = $entrepriseModel->find($id);

        // Si l'entreprise existe
        if ($entreprise) {
            // Décoder le champ services s'il est en JSON
            if (!empty($entreprise['services'])) {
                $entreprise['services'] = json_decode($entreprise['services'], true);
            }

            // Envoyer les données à la vue entreprise_view
            return view('entreprise_view', ['entreprise' => $entreprise]);

        } else {
            // Afficher un message d'erreur ou rediriger vers une page d'erreur
            return redirect()->back()->with('error', 'Entreprise non trouvée');
        }
    }
}
