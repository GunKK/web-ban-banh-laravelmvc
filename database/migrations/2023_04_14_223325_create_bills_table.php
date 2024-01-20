<?php

use App\Enums\BillStatus;
use App\Enums\PaymentMethod;
use App\Enums\PaymentStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->double('payment_amount', 15,8);
            $table->enum('payment_method', array(PaymentMethod::Cash, PaymentMethod::Paypal))->default(PaymentMethod::Cash);
            $table->enum('status', array(BillStatus::Processing, BillStatus::Delivering, BillStatus::Success, BillStatus::Failure))->default(BillStatus::Processing);
            $table->enum('payment_status', array(PaymentStatus::Incomplete, PaymentStatus::Complete))->default(PaymentStatus::Incomplete);
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->string('receiver');
            $table->string('address_receiver');
            $table->string('phone_receiver');
            $table->string('note')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
};
