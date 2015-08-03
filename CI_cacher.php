<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
 
/**
* Cache Library Class
*/
class Cacher
{
    var $_ci;
    var $_useCache;
    var $_cacheExpire;
    var $_cleanFactor;
 
    /**
     * Constructor
     *
     * @access    public
     */    
    function Cacher()
    {
        $this->_ci =& get_instance();
        $this->_useCache = $this->_ci -> config -> item("use_cache");    
        $this->_cacheExpire= (int)$this->_ci -> config -> item("cache_expiration");         
        $this->_cleanFactor = (int)$this->_ci -> config -> item("cache_clean_factor");            
    }
 
    // --------------------------------------------------------------------
 
     /**
     * Cache the current page using CI cache
     * Clean the cache directory on every 'cache_clean_factor' writes on avarage
     * Warning: When the time comes, the cleaner will delete all files in the cache directory
     * @access    public
     * @return    void
     */    
    function cachePage($expiration = 0)
    {
        if($this->_useCache != 'false')
        {
            if($expiration > 0)
                $this->_ci->output->cache($expiration);
            else 
                $this->_ci->output->cache($this->_cacheExpire);
            
            if($this->_cleanFactor > 0)
            {
                if(mt_rand(1, $this->_cleanFactor) == 1) 
                    $this->_clean();
            }
        }
    }
 
    // --------------------------------------------------------------------
 
    /**
     * Clean all cache in the cache dir
     *
     * @access    private
     * @return    number of cleaned files or false on error
     */    
    function _clean()
    {
        $dir = $this->_ci->config->item('cache_path');
 
        if(!@is_dir($dir))
            return false;
 
        if( ! $fp = @opendir($dir))
            return false;
        
        $count = 0;
        $retVal = true;
        
        while ($file = @readdir($fp))
        {                
            $fullPath = $dir.$file;
            
            if(!@is_file($fullPath))
                continue;
                
            //Cache file names are 32 chars in size (because md5). Just extra caution
            if(@strlen($file) != 32)
                continue;
 
            if(@unlink($fullPath))
                $count++;            
            else 
                $retVal = false;
                
        }
        closedir($fp)
        if($retVal)
            return $count;
        else 
            return false;
 
    }    
}
?>
