<?php
    class Sanpham{
        private $masp;
        private $tensp;
        private $dongia;
        public function __construct($ma,$ten,$diachi){
            $this->masp = $ma;
            $this->tensp = $ten;
            $this->dongia = $diachi;
        }
        public function __destruct(){
            $this->masp = "";
            $this->tensp = "";
            $this->dongia = "";
        }
        public function getMasp(){
            return $this->masp;
        }
        public function getTensp(){
            return $this->tensp;
        }
        public function getDongia(){
            return $this->dongia;
        }
        public function add(){
            $root=new DomDocument("1.0");
            $root->load('Sanpham.xml');
            $rootTag=$root->getElementsByTagName("qlsp")->item(0);
            $infoTag=$root->createElement("Sanpham");
            $MaspTag=$root->createElement("Masp",$this->masp);
            $TenspTag=$root->createElement("Tensp",$this->tensp);
            $DongiaTag=$root->createElement("Dongia",$this->dongia);
            $infoTag->appendChild($MaspTag);
            $infoTag->appendChild($TenspTag);
            $infoTag->appendChild($DongiaTag);
            $rootTag->appendChild($infoTag);
            $root->formatoutput=true;
            $root->save('Sanpham.xml');
        }
        public function update(){
            $root=new DomDocument("1.0");
            $root->load('Sanpham.xml');
            $xpath = new DOMXPATH($root);
            $kq=$xpath->query("/qlsp/Sanpham[Masp='$this->masp']");
            foreach($kq as $node){
                // tạo node mới
                $infoTag=$root->createElement("Sanpham");
                $MaspTag=$root->createElement("Masp",$this->masp);
                $TenspTag=$root->createElement("Tensp",$this->tensp);
                $DongiaTag=$root->createElement("Dongia",$this->dongia);
                $infoTag->appendChild($MaspTag);
                $infoTag->appendChild($TenspTag);
                $infoTag->appendChild($DongiaTag);
                $node->parentNode->replaceChild($infoTag, $node);
            }
            $root->formatoutput=true;
            $root->save('Sanpham.xml');
        }
        public function Delete(){
            $root=new DomDocument("1.0");
            $root->load('Sanpham.xml');
            $xpath = new DOMXPATH($root);
            foreach($xpath->query("/qlsp/Sanpham[Masp='$this->masp']") as $node){
                $node->parentNode->removeChild($node);
            }
            $root->formatoutput=true;
            $root->save('Sanpham.xml');
        }
    }
?>