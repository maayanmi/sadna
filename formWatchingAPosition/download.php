<?php
										 		 if (isset($_GET['file'])) {
                                                
                                                $file = $_GET["file"];
                                                $name = basename($file) ;
                                                
                                                
                                                header("Content-type:application/pdf");
                                                
                                                // It will be called downloaded.pdf
                                                header("Content-Disposition:attachment;filename='{$name}'");
                                                
                                                // The PDF source is in original.pdf
                                                readfile("$file");
                                                
                                            
                                    
                                      }
                                      ?>