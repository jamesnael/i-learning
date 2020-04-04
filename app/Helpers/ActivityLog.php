<?php

/**
 *  @abstract Log setting
 *  @return setting
 *  @author Muhammar Rafsanjani <amarafsanjani@gmail.com>
**/
function setupLog($menu_name)
{
    date_default_timezone_set('asia/jakarta');
    $month_now = date("Y-m");
    $dir       = "log/log_activity/" . $month_now . "/";
    
    if (!file_exists($dir)) 
    {
        mkdir($dir, 0777, true);
    }

    $file      = "log_" . str_replace(' ','_',strtolower($menu_name));
    $path_file = $dir . $file . ".txt";

    $setup['delimiter_id']  = "|%|";
    $setup['delimiter_row'] = "|#|";
    $setup['delimiter']     = "|";
    $setup['path_file']     = $path_file;

    return $setup;
}

/**
 *  @abstract Insert Log file
 *  @return file .txt
 *  @author Muhammar Rafsanjani <amarafsanjani@gmail.com>
**/
function createLog($data_new, $data_old, $data_change, $message, $activity, $id_user="", $menu="") 
{
    date_default_timezone_set('asia/jakarta');
    /* Get user by login */
    $role      = Auth::user()->role;
    $full_name = Auth::user()->name;

    /* Clean activity */
    $clean_activity = ucwords(str_replace('_',' ',$activity));

    /* Get menu name */
    $menu_name = $menu;
    
    $data  = array(
                    'id'          => '',
                    'actor'       => $full_name,
                    'role'        => $role,
                    'menu'        => $menu_name,
                    'data_new'    => $data_new,
                    'data_old'    => $data_old,
                    'data_change' => $data_change,
                    'message'     => $message,
                    'activity'    => $clean_activity,
                    'created_on'  => date('Y-m-d H:i:s'), 
                    ); 

    $setup = setupLog($menu_name);

    if (file_exists($setup['path_file']))
    {
        /* If file exist */
        $file_exists = file_get_contents($setup['path_file']);
        $file_exists = explode($setup['delimiter_id'],$file_exists);

        $log_ext    = explode($setup['delimiter_row'],$file_exists[1]);

        for ($i=0; $i < count($log_ext); $i++) 
        { 
            $log_ext_real[$i] = $log_ext[$i];
        }

        $last_id   = explode($setup['delimiter'],end($log_ext_real));

        if(!empty($data['id']))
        {
            $id = $data['id'];
        }
        else
        {
            $id = current($last_id) + 1;                
        }

        $log      = $setup['delimiter_row'];
        $log     .= $id;
        foreach ($data as $key => $value)
        {
            if($key != 'id')
            {
                $log   .= $setup['delimiter'] . $value;
            }
        }

        file_put_contents($setup['path_file'],$log,FILE_APPEND);
    }
    else
    {
        /* If file not exist, create new */
        if(!empty($data['id']))
        {
            $id = $data['id'];
        }
        else
        {
            $id = 1;
        }
        
        $header = "id";
        $log    = $id;

        foreach ($data as $key => $value)
        {
            if($key != 'id')
            {
                $header .= $setup['delimiter'] . $key;
                $log    .= $setup['delimiter'] . $value;
            }
        }

        // $log   .= $setup['delimiter_row'];
        $header .= $setup['delimiter_id'];

        file_put_contents($setup['path_file'],$header,FILE_APPEND);
        file_put_contents($setup['path_file'],$log,FILE_APPEND);
    }
}

/**
 *  @abstract Get header Log file
 *  @return Array data
 *  @author Muhammar Rafsanjani <amarafsanjani@gmail.com>
**/
function headerLog($menu_name)
{
    $setup = setupLog($menu_name);

    if (file_exists($setup['path_file']))
    {
        $file_exists = file_get_contents($setup['path_file']);
        $file_exists = explode($setup['delimiter_id'],$file_exists);

        $header_ext  = explode($setup['delimiter'],$file_exists[0]);

        return $header_ext;
    }
    else
    {
        return array();
    }
}

/**
 *  @abstract Get content Log file
 *  @return Array data
 *  @author Muhammar Rafsanjani <amarafsanjani@gmail.com>
**/
function contentsLog($id="",$menu_name="")
{
    $setup = setupLog($menu_name);

    if (file_exists($setup['path_file']))
    {
        $file_exists = file_get_contents($setup['path_file']);
        $file_exists = explode($setup['delimiter_id'],$file_exists);
        $header_ext  = headerLog($menu_name);

        if (is_array($file_exists))
        {
            $log_ext    = explode($setup['delimiter_row'],$file_exists[1]);

            for ($i=0; $i < count($log_ext); $i++)
            {
                $log_ext_real[$i] = array();
                $detail[$i]       = explode($setup['delimiter'],$log_ext[$i]);

                for ($x=0; $x < count($header_ext); $x++) 
                { 
                    $log_add[$i][$header_ext[$x]] = $detail[$i][$x];
                }

                $log_ext_real[$i] = (object) $log_add[$i];
            }
        }
        else
        {
            $log_ext_real = array();
            $detail       = explode($setup['delimiter'],$file_exists[1]);

            for ($i=0; $i < count($header_ext); $i++) 
            { 
                $log_add[$header_ext[$i]] = $detail[$i];
            }

            $log_ext_real[] = (object) $log_add;
        }

        $counting_log_ext_real = array_map('end', $log_ext_real);
        
        if (!empty($id))
        {   
            for ($i=0; $i < count($counting_log_ext_real); $i++) 
            {     
                if ($log_ext_real[$i]->id == $id) 
                {
                    $log_ext_real_id = (object) $log_ext_real[$i];
                }
            }
        }

        return (!empty($id)) ? $log_ext_real_id : $log_ext_real;
    }
    else
    {
        return array();
    }
}

