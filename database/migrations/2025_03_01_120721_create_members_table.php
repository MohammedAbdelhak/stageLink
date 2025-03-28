<?php

use App\Models\Company;
use App\Models\Department;
use App\Models\Internship;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Internship::class, 'internship_id' )->constrained()->onDelete('cascade');
            $table->foreignIdFor(User::class, 'student_id' )->constrained()->onDelete('cascade');
            $table->foreignIdFor(Company::class, 'company_id' )->constrained()->onDelete('cascade');
            $table->foreignIdFor(Department::class, 'department_id' )->constrained()->onDelete('cascade');
            $table->text('certificate')->nullable();
            $table->enum("status" , ['accepted' , 'refused' , 'pending']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
