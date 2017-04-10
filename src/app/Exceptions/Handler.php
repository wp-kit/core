<?php

	namespace WPKit\Exceptions;
	
	use Exception;
    use Illuminate\Contracts\Debug\ExceptionHandler as ExceptionHandlerContract;
    use Illuminate\Http\Response;
	
	class Handler implements ExceptionHandlerContract {

        protected $handlers = array();


        /**
         * Report or log an exception.
         *
         * @param  \Exception $e
         *
         * @return void
         */
        public function report( Exception $e ) {
	        
	        if ( defined('WP_DEBUG') && true === WP_DEBUG ) {

				//wp_die( $e->getMessage() );
				
			} else {
				
				error_log( $e->getMessage() );
				
			}
		
        }


        /**
         * Render an exception into an HTTP response.
         *
         * @param  \Illuminate\Http\Request $request
         * @param  \Exception               $e
         *
         * @return \Symfony\Component\HttpFoundation\Response
         */
        public function render( $request, Exception $e ) {
            return new Response( $e->getMessage(), 500 );
        }


        /**
         * Render an exception to the console.
         *
         * @param  \Symfony\Component\Console\Output\OutputInterface $output
         * @param  \Exception                                        $e
         *
         * @return void
         */
        public function renderForConsole( $output, Exception $e ) {
            echo $e->getMessage();
        }

    }