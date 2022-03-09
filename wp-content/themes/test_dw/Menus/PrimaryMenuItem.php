<?php

class PrimaryMenuItem{

    protected $post;
    public $url;
    public $title;
    public $label;
    public $subitems = [];

    function __construct($post){
        $this->post = $post;

        $this->url = $post->url;
        $this->label = $post->title;
        $this->title = $post->attr_title;
    }

    public function hasSubItems(){
        //Regarder s'il y a des éléments dans $this->subitems. Si c'est le cas, cet $item possède effectivement un sous menu
        return ! empty($this->subitems);
    }

    public function isSubItem(){
        //Regarder si cet $item possède un identifiant de post parent. Si c'est le cas,
        return boolval($this->getParentId());
    }

    public function isParentFor(PrimaryMenuItem $instance){
        //Regarder si l'élément fournit possède une référence de parent qui correspond à l'idientifiant de cet $item
        return ($this->post->ID === $instance->getParentId());
    }

    public function getParentId(){
        //Retourner l'identifiant (référence) de l'item parent
        return $this->post->menu_item_parent;
    }

    public function addSubItem(PrimaryMenuItem $instance){
        //Ajouter l'instance de ...
        $this->subitems[] = $instance;
    }

    public function getBemClasses($base){
        $icon = get_field('icon', $item);
        $container_classes = [];

        if($icon){
            $container_classes[] = $icon;
        }

        if($item->current){
            $container_classes[] = 'current';
        }

        if(in_array('menu-item-type-custom', $item->classes)){
            $container_classes[] = 'custom';
        }

        $value = $base;

        foreach ($modifiers as $modifier){
            $value .= ' ' . $base . '--' . $modifier;
        }

        return $value;
    }
}