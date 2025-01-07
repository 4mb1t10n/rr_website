<?php

class Theme_AutoLoader {

  public static function init() {
        self::load( TEMPLATEPATH .'/template-parts/*.php' );
        self::load( TEMPLATEPATH .'/template-parts/*/*.php' );
        self::load( TEMPLATEPATH .'/includes/*.php' );
        self::load( TEMPLATEPATH .'/includes/*/*.php' );
  }

  private static function load( $pattern ) {
        $files = glob( $pattern );
        if ( ! $files ) return;

    foreach ( $files as $file ) {
            require_once $file;

            $name = basename( $file );

            /** Compose classname from filename */
            $class_name = array_reduce( explode( '-', str_replace( '.php', '', $name ) ), function ( $full, $part ) {
                $full[] = ucfirst( $part );
                return $full;
            }, [] );

            $class_name = implode( '_', $class_name );

            if ( method_exists( $class_name, 'init' ) ) $class_name::init();
    }
  }
}
