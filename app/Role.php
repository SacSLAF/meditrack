<?php

namespace App;

enum Role: string {
    case ADMIN = 'admin';
    case DOCTOR = 'doctor';
    case RECEPTIONIST = 'receptionist';
    case PHARMACIST = 'pharmacist';
}
