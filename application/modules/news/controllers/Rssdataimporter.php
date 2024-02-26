<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Rssdataimporter extends MX_Controller {

    
    public function __construct(){
        parent::__construct();
        $this->load->model('common_model');  
    }


    public function getDataSaver()
    {

        $settings = $this->db->select('*')->where('status',1)->get('rss_link_setup_tbl')->result();

        foreach ($settings as $val) {

            $i=0;
            $feed = simplexml_load_file($val->rss_link);

            // echo "<pre>";
            // print_r($feed);

            foreach ($feed->channel->item as $item) {


                if($val->post_number==$i)
                    break;
                
                    $postData['title'] =  (string) $item->title;
                    $postData['link'] =  (string) $item->link;
                    $postData['description'] = (string) $item->description;
                    
                    $encode_title = $this->explodedtitle($postData['title']);
                    
                    $data = array(
                        'encode_title'      => $this->clean($encode_title),
                        'seo_title'         => '',
                        'home_page'         => '',
                        'other_page'        => $val->category_slug,
                        'other_position'    => 1,
                        'image'             => @$img,
                        'image_base_url'    => '',
                        'image_alt'         => '',
                        'image_title'       => '',
                        'picture_name'      => '',
                        'podcust_id'        => '',
                        'videos'            => '',
                        'stitle'            => '',
                        'title'             => $postData['title'],
                        'reporter'          => 1,
                        'news'              => $postData['description'],
                        'confirm_dynamic_static' => 0,
                        'latest_confirmed'  => 1,
                        'breaking_confirmed' => 0,
                        'send_to_temp'      => '',
                        'reference'         => '',
                        'ref_date'          => date('Y-m-d'),
                        'publish_date'      => date('Y-m-d'),
                        'post_by'           => 1,
                        'status1'           =>  1
                    );
                    
            // echo "<pre>";
            // print_r($data);exit;
                    $result = $this->common_model->pbnews_post($data);
                    $i++;

            }
            
        }
        
        echo "success";
    }




    public function importImg($src)
    {

        $img = file_get_contents($src);
        $im = imagecreatefromstring($img);
        $image = 'news35_'.time().'.jpg';

        #-----------------------------------
        #  Large Image
        #-----------------------------------
        $newwidth = '825';
        $newheight = '630';
                list($width, $height) = getimagesize($src);
                $ratio = max($newwidth / $width, $newheight / $height);
                $h = ceil($newheight / $ratio);
                $x = ($width - $newwidth / $ratio) / 2;
                $w = ceil($newwidth / $ratio);
        $large = imagecreatetruecolor($newwidth, $newheight);
        imagecopyresized($large, $im, 0, 0, $x, 0, $newwidth, $newheight, $w, $h);
        imagejpeg($large,'uploads/'.$image); //save image as jpg
        imagedestroy($large); 

        #-----------------------------------
        #  Thumb Image
        #-----------------------------------
        $newwidth1 = '370';
        $newheight1 = '300';
                list($width, $height) = getimagesize($src);
                $ratio = max($newwidth1 / $width, $newheight1 / $height);
                $h1 = ceil($newheight1 / $ratio);
                $x1 = ($width - $newwidth1 / $ratio) / 2;
                $w1 = ceil($newwidth1 / $ratio);
        $thumb = imagecreatetruecolor($newwidth1, $newheight1);
        imagecopyresized($thumb, $im, 0, 0, $x, 0, $newwidth1, $newheight1, $w1, $h1);
        imagejpeg($thumb,'uploads/thumb/'.$image); //save image as jpg
        imagedestroy($thumb); 
        #------------------------------------

        return $image;
    }



    function clean($string) {
       $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
       return preg_replace('/[^A-Za-z0-9\-]/', '-', $string); // Removes special chars.
    }


    function explodedtitle($title) {
        $extitle =  @trim(@implode('-', @preg_split("/[\s,-\:,()]+/", @$title)), '');
        $string = str_replace(' ', '-', trim($title)); 
        return  $string;
    }

    
    function string_clean($string) {
        $string = str_replace(' ', '', $string); 
        return $text = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
    }



}