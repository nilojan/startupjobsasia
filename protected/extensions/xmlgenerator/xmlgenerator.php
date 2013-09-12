    <?php
// Yii extension created by Marco Troisi
// Based on Simon Willison's php XMLWriter class
// Based on Lars Marius Garshol's Python XMLWriter class
// See http://www.xml.com/pub/a/2003/04/09/py-xml.html
// For any question: hello@marcotroisi.com  

class XmlGenerator {

    var $xml;
    var $indent;
    var $stack=array();

    function XmlGenerator($version="1.0",$encoding="UTF-8",$indent=' ')
    {
        $this->indent=$indent;
        ob_clean();
        $this->xml='<?xml version="'.$version.'" encoding="'.$encoding.'"?>'."\n";
    }

    function _indent()
    {
        for ($i=0,$j=count($this->stack); $i<$j; $i++)
        {
            $this->xml .= $this->indent;
        }
    }

    function text($text)
    {
        $this->_indent();
        $this->xml .= $text;
        $this->xml .= "\n";
    }

    function push($element,$attributes=array())
    {
        $this->_indent();
        $this->xml .= '<'.$element;
        foreach ($attributes as $key => $value)
        {
            $this->xml .= ' '.$key.'="'.htmlentities($value).'"';
        }
        $this->xml .= ">\n";
        $this->stack[]=$element;
    }

    function element($element,$content,$cdata=0,$attributes=array())
    {
        $this->_indent();
        $this->xml .= '<'.$element;
        foreach ($attributes as $key => $value)
        {
            $this->xml .= ' '.$key.'="'.htmlentities($value).'"';
        }
        $this->xml .= '>'.(($cdata==1) ? "<![CDATA[" : "").htmlentities($content).(($cdata==1) ? "]]>" : "").'</'.$element.'>'."\n";
    }

    function emptyelement($element,$attributes=array())
    {
        $this->_indent();
        $this->xml .= '<'.$element;
        foreach ($attributes as $key => $value)
        {
            $this->xml .= ' '.$key.'="'.htmlentities($value).'"';
        }
        $this->xml .= " />\n";
    }

    function pop()
    {
        $element=array_pop($this->stack);
        $this->_indent();
        $this->xml .= "</$element>\n";
    }

    function getXml()
    {
        return $this->xml;
    }

}
?>  
