<?= $this->extend('backend/layout') ?>
<?= $this->section('content'); ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title text-center">Enregistrement de l'entreprise</h4>
                    
                    <!-- Zone pour les messages -->
                    <div id="messageContainer"></div>

                    <!-- Formulaire HTML -->
                    <form id="entrepriseForm" action="<?= base_url() ?>saveEntreprise" method="post" enctype="multipart/form-data">
                        <!-- Champ pour le nom de l'entreprise -->
                        <div class="mb-3">
                            <label for="nom_entreprise" class="form-label">Nom de l'entreprise :</label>
                            <input type="text" name="nom_entreprise" id="nom_entreprise" class="form-control" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="apropos" class="form-label">A propos de l'entreprise :</label>
                            <input type="text" name="apropos" id="apropos" class="form-control" required>
                        </div>

                        <!-- Champ pour télécharger une image -->
                        <div class="mb-3">
                            <label for="image" class="form-label">Mignature (max. 2 Mo) :</label>
                            <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
                        </div>

                        <hr>

                        <!-- Section des couleurs, tailles et polices alignées horizontalement -->
                        <div class="row">
                            <!-- Couleur principale du site -->
                            <div class="col-md-4 mb-3">
                                <label for="primary_color" class="form-label">Couleur principale du site :</label>
                                <input type="color" name="primary_color" id="primary_color" class="form-control color-picker">
                            </div>

                            <!-- Couleur des boutons -->
                            <div class="col-md-4 mb-3">
                                <label for="button_color" class="form-label">Couleur des boutons :</label>
                                <input type="color" name="button_color" id="button_color" class="form-control color-picker">
                            </div>

                            <!-- Couleur des icônes -->
                            <div class="col-md-4 mb-3">
                                <label for="icon_color" class="form-label">Couleur des icônes :</label>
                                <input type="color" name="icon_color" id="icon_color" class="form-control color-picker">
                            </div>
                        </div>

                        <div class="row">
                            <!-- Couleur des textes -->
                            <div class="col-md-4 mb-3">
                                <label for="text_color" class="form-label">Couleur des textes :</label>
                                <input type="color" name="text_color" id="text_color" class="form-control color-picker">
                            </div>

                            <!-- Taille des titres -->
                            <div class="col-md-4 mb-3">
                                <label for="title_size" class="form-label">Taille des titres (px) :</label>
                                <input type="number" name="title_size" id="title_size" class="form-control size-input" min="10" max="72">
                            </div>

                            <!-- Taille des paragraphes -->
                            <div class="col-md-4 mb-3">
                                <label for="paragraph_size" class="form-label">Taille des paragraphes (px) :</label>
                                <input type="number" name="paragraph_size" id="paragraph_size" class="form-control size-input" min="10" max="72">
                            </div>
                        </div>

                        <!-- Sélection des polices -->
                        <div class="row">
                            <!-- Police des titres -->
                            <div class="col-md-6 mb-3">
                                <label for="title_font" class="form-label">Police des titres :</label>
                                <select name="title_font" id="title_font" class="form-control">
                                    <option value="Arial">Arial</option>
                                    <option value="Verdana">Verdana</option>
                                    <option value="Times New Roman">Times New Roman</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Courier New">Courier New</option>
                                    <option value="Helvetica">Helvetica</option>
                                    <option value="Roboto">Roboto</option>
                                </select>
                            </div>

                            <!-- Police des paragraphes -->
                            <div class="col-md-6 mb-3">
                                <label for="paragraph_font" class="form-label">Police des paragraphes :</label>
                                <select name="paragraph_font" id="paragraph_font" class="form-control">
                                    <option value="Arial">Arial</option>
                                    <option value="Verdana">Verdana</option>
                                    <option value="Times New Roman">Times New Roman</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Courier New">Courier New</option>
                                    <option value="Helvetica">Helvetica</option>
                                    <option value="Roboto">Roboto</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <!-- Conteneur pour les images du carrousel -->
                        <h5>Carrousel</h5>
                        <div id="carouselContainer"></div>

                        <!-- Bouton pour ajouter une image au carrousel -->
                        <button type="button" id="addCarouselImageBtn" class="btn btn-success mb-3">
                            <i class="fas fa-plus"></i> Ajouter une image pour le carrousel
                        </button>
                        <hr>
                        <!-- Conteneur pour les services supplémentaires -->
                        <h5>Services</h5>
                        <div id="servicesContainer"></div>
                        <!-- Bouton pour ajouter un service supplémentaire -->
                        <button type="button" id="addServiceBtn" class="btn btn-success mb-3">
                            <i class="fas fa-plus"></i> Ajouter un service
                        </button>

                        <!-- Section d'ajout d'images de partenaires -->
                        <div class="row">
                            <div class="col-md-12">
                                <label for="partner_images" class="form-label">Ajouter des images de partenaires :</label>
                            </div>
                        </div>

                        <div id="partnerImagesContainer"></div>

                        <button type="button" id="addPartnerImageBtn" class="btn btn-success mb-3">
                            <i class="fas fa-plus"></i> Ajouter une image de partenaire
                        </button>

                        <hr>
                        <!-- Conteneur pour les nouvelles localisations -->
                        <div id="localisationContainer"></div>

                        <!-- Bouton pour ajouter une nouvelle localisation -->
                        <button type="button" id="addLocationButton" class="btn btn-success mb-3">
                            <i class="fas fa-plus"></i> Ajouter une localisation
                        </button>
                        <hr>

                        <!-- Section pour les contacts -->
                        <h5>Contacts</h5>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="whatsapp" class="form-label">Contact WhatsApp :</label>
                                <input type="text" name="whatsapp" id="whatsapp" class="form-control" placeholder="Numéro WhatsApp" required>
                            </div>

                            <div class="col-md-4">
                                <label for="instagram" class="form-label">Profil Instagram :</label>
                                <input type="text" name="instagram" id="instagram" class="form-control" placeholder="URL du profil Instagram" required>
                            </div>

                            <div class="col-md-4">
                                <label for="tiktok" class="form-label">Profil TikTok :</label>
                                <input type="text" name="tiktok" id="tiktok" class="form-control" placeholder="URL du profil TikTok" required>
                            </div>
                        </div>

                        <!-- Bouton pour valider -->
                        <div class="d-grid">
                            <button type="submit" name="submit" class="btn btn-primary">Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

</script>

<?= $this->endSection(); ?>
