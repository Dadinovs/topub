<?php

namespace App\Controllers;

use App\Models\EntreprisesModel;
use CodeIgniter\Controller;

class FormController extends BaseController
{
    public function index(): string
    {
        // Charger la vue du formulaire
        return view('backend/saveentreprise');
    }

    public function saveEntreprise()
    {
        $entrepriseModel = new EntreprisesModel();
        
        // Validation des données
        if (!$this->validate([
            'nom_entreprise' => 'required',
            'apropos' => 'required',
            'image' => 'uploaded[image]|is_image[image]|max_size[image,2048]',
        ])) {
            return $this->response->setJSON(['success' => false, 'message' => 'Données invalides : ' . implode(', ', $this->validator->getErrors())]);
        }
    
        // Récupérer les données du formulaire
        $nom_entreprise = $this->request->getPost('nom_entreprise');
        $apropos = $this->request->getPost('apropos');
        
        // Gérer l'image de l'entreprise
        $fileImage = $this->request->getFile('image');
        if ($fileImage->isValid() && !$fileImage->hasMoved()) {
            $imageName = $fileImage->getRandomName();
            $fileImage->move('uploads/', $imageName);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Erreur lors du téléchargement de l\'image']);
        }
        
        // Récupérer les services
        $services = [];
        $i = 1;
        while ($this->request->getPost('service' . $i)) {
            $serviceName = $this->request->getPost('service' . $i);
            $fileServiceImage = $this->request->getFile('imageservice' . $i);
            
            if ($fileServiceImage->isValid() && !$fileServiceImage->hasMoved()) {
                $serviceImageName = $fileServiceImage->getRandomName();
                $fileServiceImage->move('uploads/services/', $serviceImageName);
                $services[] = [
                    'service_name' => $serviceName,
                    'service_image' => $serviceImageName,
                ];
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'Erreur lors du téléchargement de l\'image du service ' . $i]);
            }
            $i++;
        }
    
        // Gérer les localisations dynamiques
        $localisations = [];
        $i = 1;
        while ($this->request->getPost('localisation' . $i)) {
            $localisation = $this->request->getPost('localisation' . $i);
            if ($localisation) {
                $localisations[] = $localisation;
            }
            $i++;
        }
    
        // Gérer les images du carrousel
        $carouselImages = [];
        $i = 1;
        while ($this->request->getFile('carouselImage' . $i)) {
            $fileCarouselImage = $this->request->getFile('carouselImage' . $i);
            if ($fileCarouselImage->isValid() && !$fileCarouselImage->hasMoved()) {
                $carouselImageName = $fileCarouselImage->getRandomName();
                $fileCarouselImage->move('uploads/carousel/', $carouselImageName);
                $carouselImages[] = $carouselImageName;
            }
            $i++;
        }
    
        // Enregistrement dans la base de données
        $data = [
            'nom_entreprise' => $nom_entreprise,
            'apropos' => $apropos,
            'image' => $imageName,
            'services' => json_encode($services),
            'localisations' => json_encode($localisations),
            'carousel_images' => json_encode($carouselImages),
        ];
    
        if ($entrepriseModel->insert($data)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Entreprise enregistrée avec succès !']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Erreur lors de l\'enregistrement.']);
        }
    }
    
    
    
}
