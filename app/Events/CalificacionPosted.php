<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use App\Models\Calificacion;
class CalificacionPosted implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    // La calificacion posteada
    public $calificacion;
    
    // La gimnasta de la calificacion posteada
    public $gimnasta;
    
    // La discipliona de la calificacion posteada
    public $disciplina;

    /**
     * Create a new event instance.
     * It loads it with an instance of a
     *  calificacion.
     * @return void
     */
    public function __construct(Calificacion $calificacion)
    {

        $this->calificacion = $calificacion->load('gimnasta','disciplina');
        $this->gimnasta = $calificacion->gimnasta;
        $this->disciplina = $calificacion->disciplina;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('calificaciones');
    }
}
