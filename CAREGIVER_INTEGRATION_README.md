# Intégration des données Angehöriger/Pflegeperson

## Résumé des modifications

Cette mise à jour ajoute la possibilité de sauvegarder les données de contact des Angehöriger/Pflegeperson dans la base de données et de les afficher dans le résumé de l'étape 5.

## Colonnes ajoutées à la table `customers`

- `insured_type` (enum: 'Versicherter', 'Angehöriger / Pflegeperson', nullable) - Type d'assurance sélectionné
- `pflegegrad` (enum: 'Pflegegrad1', 'Pflegegrad2', 'Pflegegrad3', 'Pflegegrad4', 'Pflegegrad5', nullable) - Niveau de soins sélectionné
- `caregiver_name` (string, nullable) - Nom de l'Angehöriger/Pflegeperson
- `caregiver_phone` (string, nullable) - Numéro de téléphone de l'Angehöriger/Pflegeperson  
- `caregiver_email` (string, nullable) - Email de l'Angehöriger/Pflegeperson

## Fichiers modifiés

### 1. Migrations
- `database/migrations/2025_09_07_164720_add_caregiver_fields_to_customers_table.php`
  - Ajoute les 3 colonnes caregiver à la table customers
- `database/migrations/2025_09_07_165510_add_insured_type_to_customers_table.php`
  - Ajoute la colonne insured_type à la table customers
- `database/migrations/2025_09_07_171020_add_pflegegrad_to_customers_table.php`
  - Ajoute la colonne pflegegrad à la table customers

### 2. Modèle Customer
- `app/Models/Customer.php`
  - Ajoute les nouveaux champs (insured_type, pflegegrad, caregiver_*) dans le tableau `$fillable`

### 3. Fonctions de sauvegarde
- `app/Helpers/helpers.php`
  - Modifie `saveCustomerWithDeliverAddress()` pour inclure insured_type, pflegegrad et les données Angehöriger
- `app/Http/Controllers/OrderController.php`
  - Modifie `customerInfo()` pour inclure insured_type, pflegegrad et les données Angehöriger

### 4. Interface utilisateur
- `resources/views/livewire/frontend/assemble.blade.php`
  - Ajoute la section Angehöriger dans le résumé de l'étape 5
  - Modifie `fillSummaryData()` pour l'affichage conditionnel
  - Met à jour le JavaScript de recherche d'email pour pré-remplir les champs
  - Ajoute la collecte de `insured_type` et `pflegegrad` dans les données du formulaire

### 5. Correction de la fonction de recherche
- `routes/web.php`
  - Ajoute la route POST `/check-email-exists` pour la recherche d'email
- `app/Http/Controllers/HomeController.php`
  - Ajoute la méthode `checkEmailExists()` pour rechercher les clients dans la base de données

## Fonctionnement

### Étape 2 - Saisie des données
1. L'utilisateur sélectionne "Versicherter" ou "Angehöriger / Pflegeperson"
2. L'utilisateur sélectionne un Pflegegrad (1, 2, 3, 4, ou 5)
3. Si "Angehöriger / Pflegeperson" est sélectionné, le bloc de contact s'affiche automatiquement
4. L'utilisateur remplit les champs : Name, Telefonnummer, Email (si applicable)

### Étape 5 - Résumé
1. Le système vérifie si au moins un champ Angehöriger est rempli
2. Si oui : la section "Kontaktdaten Angehöriger/Pflegeperson" s'affiche avec les données
3. Si non : la section reste masquée

### Sauvegarde en base de données
1. Les données sont collectées via JavaScript dans `userDetails`
2. Elles sont envoyées aux fonctions de sauvegarde
3. Elles sont mappées vers les colonnes correspondantes :
   - `insured_type` → `insured_type` (Versicherter ou Angehöriger / Pflegeperson)
   - `pflegegrad` → `pflegegrad` (Pflegegrad1, Pflegegrad2, Pflegegrad3, Pflegegrad4, Pflegegrad5)
   - `angehoriger_name` → `caregiver_name`
   - `angehoriger_telefon` → `caregiver_phone`
   - `angehoriger_email` → `caregiver_email`

## Commandes à exécuter

```bash
# Exécuter la migration pour ajouter les colonnes
php artisan migrate
```

## Fonctions de test disponibles

Dans la console du navigateur, vous pouvez tester :

```javascript
// Tester l'affichage conditionnel dans le résumé
testAngehorigerSummary();

// Tester la collecte des données pour la sauvegarde
testAngehorigerSave();

// Tester la sauvegarde du type d'assurance
testInsuredTypeSave();

// Tester la valeur complète "Angehöriger / Pflegeperson"
testFullValue();

// Tester la sauvegarde du Pflegegrad
testPflegegradSave();

// Tester la fonction de recherche d'email
testEmailSearch();

// Tester l'affichage du bloc Angehöriger
testOptperson();
```

## Notes importantes

- Les colonnes sont `nullable` pour maintenir la compatibilité avec les données existantes
- L'affichage dans l'étape 5 est conditionnel : seules les données remplies sont affichées
- Les données sont pré-remplies lors de la recherche d'email si elles existent en base
- La validation des champs Angehöriger n'est active que si le bloc est visible
- Le type d'assurance (Versicherter/Angehöriger / Pflegeperson) est maintenant sauvegardé dans `insured_type`
- Le Pflegegrad (1, 2, 3, 4, 5) est maintenant sauvegardé dans `pflegegrad`
- Les champs `insured_type` et `pflegegrad` utilisent des enums pour garantir la cohérence des données
