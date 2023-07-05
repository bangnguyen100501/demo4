<?php
    class sanpham{
        private $masp;
        private $tensp;
        private $dongia;
        public function __construct($ma,$ten,$dongia){
            $this->masp = $ma;
            $this->tensp = $ten;
            $this->dongia = $dongia;
        }
        public function __destruct(){
            $this->masp = "";
            $this->tensp = "";
            $this->dongia = "";
        }
        public function getmasp(){
            return $this->masp;
        }
        public function gettensp(){
            return $this->tensp;
        }
        public function getdongia(){
            return $this->dongia;
        }
        public function add(){
            $root=new DomDocument("1.0");
            $root->load('sanpham.xml');
            $rootTag=$root->getElementsByTagName("qlkh")->item(0);
            $infoTag=$root->createElement("sanpham");
            $maspTag=$root->createElement("masp",$this->masp);
            $TenKhTag=$root->createElement("tensp",$this->tensp);
            $dongiaTag=$root->createElement("dongia",$this->dongia);
            $infoTag->appendChild($maspTag);
            $infoTag->appendChild($TenKhTag);
            $infoTag->appendChild($dongiaTag);
            $rootTag->appendChild($infoTag);
            $root->formatoutput=true;
            $root->save('sanpham.xml');
        }
        public function update(){
            $root=new DomDocument("1.0");
            $root->load('sanpham.xml');
            $xpath = new DOMXPATH($root);
            $kq=$xpath->query("/qlkh/sanpham[masp=$this->masp]");
            foreach($kq as $node){
                // tạo node mới
                $infoTag=$root->createElement("sanpham");
                $maspTag=$root->createElement("masp",$this->masp);
                $TenKhTag=$root->createElement("tensp",$this->tensp);
                $dongiaTag=$root->createElement("dongia",$this->dongia);
                $infoTag->appendChild($maspTag);
                $infoTag->appendChild($TenKhTag);
                $infoTag->appendChild($dongiaTag);
                $node->parentNode->replaceChild($infoTag, $node);
            }
            $root->formatoutput=true;
            $root->save('sanpham.xml');
        }
        public function Delete(){
            $root=new DomDocument("1.0");
            $root->load('sanpham.xml');
            $xpath = new DOMXPATH($root);
            foreach($xpath->query("/qlkh/sanpham[masp=$this->masp]")as $node){
                $node->parentNode->removeChild($node);
            }
            $root->formatoutput=true;
            $root->save('sanpham.xml');
        }
    }
?>