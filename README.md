# SOFICAM - Land Registry & Property Management System

## Overview

SOFICAM is a comprehensive land registry and property management system designed for Cameroon. The platform digitizes and streamlines land title management, property registration, and related administrative processes for land registries, notaries, law offices (cabinets), and property management entities.

## Key Features

### 🏛️ Land Title Management (Titre Foncier)
- Complete land title (Titre Foncier) registration and management
- Direct land registration (Immatriculation Directe)
- Land title history tracking and audit trails
- QR code generation for land title documents
- Property coordinates (UTM) tracking
- Property tax (Taxe Foncière) monitoring and tracking

### 📜 Property Operations
- **Total Transfer (Mutation Totale)**: Complete property ownership transfers including inheritance cases (par décès)
- **Subdivision (Morcellement)**: Land parceling and subdivision management (voluntary and forced)
- **Joint Ownership Withdrawal (Retrait d'Indivision)**: Management of joint ownership dissolutions
- Analytical statements (Bordereau Analytique)
- Transfer statements (État de Cession)
- Property certificates (Certificat de Propriété)

### 🏘️ Land Subdivisions (Lotissements)
- Lotissement (land development) management
- Block and parcel tracking
- Subdivision sales management
- Multi-user parcel assignments

### 💼 Office Management
- Cabinet (law office/notary office) management
- Office member (Membre du Cabinet) administration
- Multi-office support with hierarchical structure

### 💰 Financial Management
- Sales tracking and reporting
- Receipt generation
- Payment processing via MeSomb (Cameroonian mobile money)
- Financial charges management
- Sales analytics and reports

### 🗺️ Geographic Features
- Interactive maps integration (using Mapbox)
- Property location visualization
- UTM coordinate management
- Regional, divisional, and sub-divisional administrative tracking

### 📊 Administration & Reporting
- User management with role-based access control (using Spatie Permissions)
- Service categorization
- Activity categories and tracking
- Comprehensive audit logging
- Document generation (PDF reports using DomPDF and mPDF)
- Excel import/export functionality
- Real estate statements (Relevé Immobilier)

### 📱 Communication & Notifications
- SMS notifications (via Twilio and Camoo SMS)
- Email notifications
- QR code scanning for document verification
- Media library for document management

### 👥 User Portal Features
- Dashboard for administrative users
- Client dashboard for tracking applications
- Payment tracking
- Property certificate requests
- Application status monitoring (Suivi de Dossier)
- Property tax tracking for property owners

## Technology Stack

### Backend
- **Framework**: Laravel 10.x
- **PHP**: 8.1+
- **Real-time UI**: Livewire 2.x
- **Authentication**: Laravel Sanctum
- **Permissions**: Spatie Laravel Permission

### Frontend
- **Build Tool**: Vite
- **QR Code Scanner**: Instascan
- **Styling**: Custom CSS with Tailwind-like utilities

### Key Packages
- **PDF Generation**: DomPDF, mPDF
- **Excel**: Maatwebsite Excel
- **QR Codes**: SimpleSoftwareIO QR Code
- **Maps**: Laravel Mapbox
- **Payment**: MeSomb PHP SDK (Cameroon mobile payments)
- **SMS**: Twilio SDK, Camoo SMS
- **Media**: Spatie Laravel Media Library
- **Forms**: Spatie Laravel Livewire Wizard

### Database
- Database agnostic (supports MySQL, PostgreSQL, SQLite)
- Comprehensive migration system

## System Requirements

- PHP 8.1 or higher
- Composer
- Node.js & NPM
- Database (MySQL/PostgreSQL recommended)
- Web server (Apache/Nginx)

## Installation

### 1. Clone the Repository
```bash
git clone <repository-url> soficam
cd soficam
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Environment Configuration
```bash
cp .env.example .env
php artisan key:generate
```

Configure your database and other services in the `.env` file:
- Database credentials
- MeSomb API credentials (for payments)
- Twilio/Camoo SMS credentials (for notifications)
- Mapbox token (for maps)
- Mail server configuration

### 4. Database Setup
```bash
php artisan migrate
php artisan db:seed
```

### 5. Storage Link
```bash
php artisan storage:link
```

### 6. Build Assets
```bash
npm run build
# or for development
npm run dev
```

### 7. Serve the Application
```bash
php artisan serve
```

Visit `http://localhost:8000` in your browser.

## User Roles

The system supports multiple user roles with granular permissions:
- **Super Admin**: Full system access
- **Admin**: Administrative functions
- **Service Manager**: Service-level management
- **Notary/Cabinet Member**: Property operations and document management
- **Client/User**: Property owners and applicants with limited access to their own data

## Key Modules

### 1. Land Registry Module
- Titre Foncier registration and management
- Immatriculation Directe processing
- Property certificates issuance

### 2. Operations Module
- Property transfers and mutations
- Land subdivisions and parceling
- Joint ownership management

### 3. Financial Module
- Sales tracking
- Payment processing
- Receipt generation
- Tax management

### 4. Geographic Module
- Regional administrative structure
- Property mapping
- Coordinate tracking

### 5. Document Management
- PDF document generation
- QR code integration
- Media library
- Template management

### 6. Reporting Module
- Sales reports
- Property reports
- Activity reports
- Audit logs

## Security Features

- Role-based access control (RBAC)
- Comprehensive audit logging
- Secure authentication with Laravel Sanctum
- Permission-based feature access
- Encrypted sensitive data
- QR code verification for documents

## Language Support

- **Primary**: French (fr)
- **Secondary**: English (en)

The application is primarily designed for French-speaking users in Cameroon, with French as the default locale.

## Contributing

Please follow the standard Git workflow:
1. Create a feature branch
2. Make your changes
3. Submit a pull request

## License

This project is proprietary software. All rights reserved.

## Support

For support and inquiries, please contact the development team.

---
**Developed for**: Land Registry Services in Cameroon
