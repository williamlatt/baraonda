<?php
class VHome extends View {
    const pageTitle = 'Ristorante Baraonda';
    public function view() {
        $this->display('home.tpl');
    }
    
}
?>