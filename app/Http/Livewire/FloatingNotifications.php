<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class FloatingNotifications extends Component
{
    
    public $buster;
    //public $notifications;
    
    public function mount()
    {
        $this->buster = now();
    }
    
    public function render()
    {
    
        $this->buster = now();
//        $this->notifications = $this->notifications->keyBy('id');
        return view('livewire.floating-notifications',[
            'notifications' => Notification::waiting()->get()
        ]);
    }
    
    public function dismiss($id)
    {
    
        Notification::find($id)->update([ 'dismissed_at' => now() ]);
        
//        $this->notifications->find($id)->update([ 'dismissed_at' => now() ]);
//        $this->notifications = $this->notifications->except($id);
        
    }
    
    public function activate($id)
    {
        $this->buster = now();
//        ddf($id);
//        ddf('activated');
        
        $notification = Notification::find($id); //$this->notifications->find($id);
//        $this->notifications = $this->notifications->except($id);
        $notification->update([ 'dismissed_at' => now() ]);
//        $this->reset('notifications');
        
        return redirect($notification->link);
    }
}
