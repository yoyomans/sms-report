<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();

            $table->foreignId('school_id')->constrained('schools')->cascadeOnDelete();
            $table->foreignId('student_id')->nullable()->constrained('students')->nullOnDelete();
            $table->foreignId('staff_id')->nullable()->constrained('staff')->nullOnDelete();
            $table->foreignId('student_contact_id')->nullable()->constrained('student_contacts')->nullOnDelete();
            $table->foreignId('provider_id')->nullable()->constrained('providers')->nullOnDelete();

            $table->string('msg_id')->unique(); // e.g. msg_123
            $table->string('webhook_url');
            $table->string('subject')->nullable();
            $table->text('message');
            $table->timestamp('sent_at');
            $table->enum('status', ['SENT', 'DELIVERED', 'FAILED', 'REJECTED']);

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
