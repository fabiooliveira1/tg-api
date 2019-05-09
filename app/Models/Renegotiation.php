<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Notifications\SendEmail;
use Illuminate\Support\Facades\Mail;

class Renegotiation extends BaseModel
{
    protected $table = 'Renegotiations';
    protected $primaryKey = 'Rng_idProposta';

    public $fillable = [
        'Rng_idConta',
        'Rng_idContato',
        'Rng_valProposta',
        'Rng_vencProposta',
        'Rng_valAntigo',
        'Rng_vencAntigo',
        'Rng_descrProposta',
        'Rng_Iniciativa',
        'Rng_Status'
    ];

    public $dates = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();

        static::created(function (Renegotiation $model) {

            dd($model->contact);

            $data = [
                'to' => $model->contact->Cnt_emailContato,
                'nameContact' => $model->contact->Cnt_nomeContato,
                'nameSupplier' => $model->contact->supplier->Forn_NomeFantasia,
                'numBill' => $model->bill->Cta_numConta
            ];

            Mail::send(new SendEmail($data));
        });

        static::deleting(function ($model) {
            if ($model->Rng_Status == 'A')
                throw new \Exception('Não é possível apagar renegociações aprovadas!', 422);
        });
    }

    public function bill()
    {
        return $this->belongsTo(Bill::class, 'Cta_idConta', 'Rng_idConta');
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'Cnt_idContato', 'Rng_idContato');
    }
}
