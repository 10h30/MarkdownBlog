<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->foreignIdFor(Post::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(User::class)->nullable()->constrained()->onDelete('cascade'); // 
            $table->foreignId('parent_id')->nullable()->constrained('comments')->onDelete('cascade'); // This is for setup reply to 
            $table->string('username');
            $table->string('email');
            $table->string('website')->nullable();
            $table->text('content');
        });
    }

    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropColumn(['username', 'email', 'website', 'content']);
            $table->dropForeignIdFor(([Post::class,User::class]));
            $table->dropForeign(['parent_id']);
            $table->dropColumn(['post_id', 'parent_id']);
        });
    }
};

