@if(count($shares)>=1)
    <div class="nk-fmg-listing nk-block-lg">
        <div class="nk-block-head-xs">
            <div class="nk-block-between g-2">
                <div class="nk-block-head-content">
                    <h6 class="nk-block-title title">Compartidos</h6>
                </div>
                <div class="nk-block-head-content">
                    <ul class="nk-block-tools g-3 nav">
                        <li><a data-toggle="tab" href="#file-grid-share" class="nk-switch-icon active"><em class="icon ni ni-view-grid3-wd"></em></a></li>
                        <li><a data-toggle="tab" href="#file-group-share" class="nk-switch-icon"><em class="icon ni ni-view-group-wd"></em></a></li>
                        <li><a data-toggle="tab" href="#file-list-share" class="nk-switch-icon"><em class="icon ni ni-view-row-wd"></em></a></li>
                    </ul>
                </div>
            </div>
        </div><!-- .nk-block-head -->
        <div class="tab-content">
            <div class="tab-pane active" id="file-grid-share">
                <div class="nk-files nk-files-view-grid">
                    <div class="nk-files-head">
                        <div class="nk-file-item">
                            <div class="nk-file-info">
                                <div class="dropdown">
                                    <div class="tb-head dropdown-toggle dropdown-indicator-down" data-toggle="dropdown">Ordenar por</div>
                                    <div class="dropdown-menu dropdown-menu-xs">
                                        <ul class="link-list-opt ui-colored no-bdr">
                                            <li class="opt-head"><span>ORDENAR POR</span></li>
                                            <li><a class="active" href="#"><span>Descendiente</span></a></li>
                                            <li><a href="#"><span>Ascending</span></a></li>
                                            <li class="divider"></li>
                                            <li class="opt-head"><span>MOSTAR</span></li>
                                            <li><a class="active" href="#"><span>Ordenar por</span></a></li>
                                            <li><a href="#"><span>Nombre</span></a></li>
                                            <li><a href="#"><span>Tamaño</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-file-actions">
                                
                            </div>
                        </div>
                    </div>
                    <div class="nk-files-list">
                    @foreach ($shares as $item)
                        <div class="nk-file-item nk-file">
                            <div class="nk-file-info">
                                <div class="nk-file-title">
                                    <div class="nk-file-icon">
                                        @if ($item->upload->mime_type == "mp4" ||  $item->upload->mime_type == "mkv" ||  $item->upload->mime_type == "wmv" ||  $item->upload->mime_type == "flv" ||  $item->upload->mime_type == "mov" ||  $item->upload->mime_type == "avi"  ||  $item->upload->mime_type == "mpeg-4")
                                        
                                                <span class="nk-file-icon-type">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                        <g>
                                                            <rect x="18" y="16" width="36" height="40" rx="5" ry="5" style="fill:#e3edfc"></rect>
                                                            <path d="M19.03,54A4.9835,4.9835,0,0,0,23,56H49a4.9835,4.9835,0,0,0,3.97-2Z" style="fill:#c4dbf2"></path>
                                                            <rect x="32" y="20" width="8" height="2" rx="1" ry="1" style="fill:#7a4d96"></rect>
                                                            <rect x="32" y="25" width="8" height="2" rx="1" ry="1" style="fill:#7a4d96"></rect>
                                                            <rect x="32" y="30" width="8" height="2" rx="1" ry="1" style="fill:#7a4d96"></rect>
                                                            <rect x="32" y="35" width="8" height="2" rx="1" ry="1" style="fill:#7a4d96"></rect>
                                                            <path d="M35,16.0594h2a0,0,0,0,1,0,0V41a1,1,0,0,1-1,1h0a1,1,0,0,1-1-1V16.0594A0,0,0,0,1,35,16.0594Z" style="fill:#7a4d96"></path>
                                                            <path d="M38.0024,40H33.9976A1.9976,1.9976,0,0,0,32,41.9976v2.0047A1.9976,1.9976,0,0,0,33.9976,46h4.0047A1.9976,1.9976,0,0,0,40,44.0024V41.9976A1.9976,1.9976,0,0,0,38.0024,40Zm-.0053,4H34V42h4Z" style="fill:#7a4d96"></path>
                                                        </g>
                                                    </svg>
                                                </span>
                                        @elseif ($item->upload->mime_type == "xlsx" || $item->upload->mime_type == "xls"  || $item->upload->mime_type == "xlt" || $item->upload->mime_type == "xls" || $item->upload->mime_type == "xml")

                                            <span class="nk-file-icon-type">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                    <path d="M49,61H23a5.0147,5.0147,0,0,1-5-5V16a5.0147,5.0147,0,0,1,5-5H40.9091L54,22.1111V56A5.0147,5.0147,0,0,1,49,61Z" style="fill:#e3edfc"></path>
                                                    <path d="M54,22.1111H44.1818a3.3034,3.3034,0,0,1-3.2727-3.3333V11s1.8409.2083,6.9545,4.5833C52.8409,20.0972,54,22.1111,54,22.1111Z" style="fill:#b7d0ea"></path>
                                                    <path d="M19.03,59A4.9835,4.9835,0,0,0,23,61H49a4.9835,4.9835,0,0,0,3.97-2Z" style="fill:#c4dbf2"></path>
                                                    <path d="M42,31H30a3.0033,3.0033,0,0,0-3,3V45a3.0033,3.0033,0,0,0,3,3H42a3.0033,3.0033,0,0,0,3-3V34A3.0033,3.0033,0,0,0,42,31ZM29,38h6v3H29Zm8,0h6v3H37Zm6-4v2H37V33h5A1.001,1.001,0,0,1,43,34ZM30,33h5v3H29V34A1.001,1.001,0,0,1,30,33ZM29,45V43h6v3H30A1.001,1.001,0,0,1,29,45Zm13,1H37V43h6v2A1.001,1.001,0,0,1,42,46Z" style="fill:#7a4d96"></path></svg>
                                            </span>
                                            
                                        @elseif ($item->upload->mime_type == "psd" || $item->upload->mime_type == "ai")
                                        
                                            <span class="nk-file-icon-type">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                    <path d="M49,61H23a5.0147,5.0147,0,0,1-5-5V16a5.0147,5.0147,0,0,1,5-5H40.9091L54,22.1111V56A5.0147,5.0147,0,0,1,49,61Z" style="fill:#e3edfc"></path>
                                                    <path d="M54,22.1111H44.1818a3.3034,3.3034,0,0,1-3.2727-3.3333V11s1.8409.2083,6.9545,4.5833C52.8409,20.0972,54,22.1111,54,22.1111Z" style="fill:#b7d0ea"></path>
                                                    <path d="M19.03,59A4.9835,4.9835,0,0,0,23,61H49a4.9835,4.9835,0,0,0,3.97-2Z" style="fill:#c4dbf2"></path>
                                                    <path d="M27.2223,43H44.7086s2.325-.2815.7357-1.897l-5.6034-5.4985s-1.5115-1.7913-3.3357.7933L33.56,40.4707a.6887.6887,0,0,1-1.0186.0486l-1.9-1.6393s-1.3291-1.5866-2.4758,0c-.6561.9079-2.0261,2.8489-2.0261,2.8489S25.4268,43,27.2223,43Z" style="fill:#000000"></path></svg>
                                            </span>

                                        @elseif ($item->upload->mime_type == "zip" || $item->upload->mime_type == "rar" )
                                            <span class="nk-file-icon-type">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                    <g>
                                                        <rect x="18" y="16" width="36" height="40" rx="5" ry="5" style="fill:#e3edfc"></rect>
                                                        <path d="M19.03,54A4.9835,4.9835,0,0,0,23,56H49a4.9835,4.9835,0,0,0,3.97-2Z" style="fill:#c4dbf2"></path>
                                                        <rect x="32" y="20" width="8" height="2" rx="1" ry="1" style="fill:#7a4d96"></rect>
                                                        <rect x="32" y="25" width="8" height="2" rx="1" ry="1" style="fill:#7a4d96"></rect>
                                                        <rect x="32" y="30" width="8" height="2" rx="1" ry="1" style="fill:#7a4d96"></rect>
                                                        <rect x="32" y="35" width="8" height="2" rx="1" ry="1" style="fill:#7a4d96"></rect>
                                                        <path d="M35,16.0594h2a0,0,0,0,1,0,0V41a1,1,0,0,1-1,1h0a1,1,0,0,1-1-1V16.0594A0,0,0,0,1,35,16.0594Z" style="fill:#7a4d96"></path>
                                                        <path d="M38.0024,40H33.9976A1.9976,1.9976,0,0,0,32,41.9976v2.0047A1.9976,1.9976,0,0,0,33.9976,46h4.0047A1.9976,1.9976,0,0,0,40,44.0024V41.9976A1.9976,1.9976,0,0,0,38.0024,40Zm-.0053,4H34V42h4Z" style="fill:#7a4d96"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                        @elseif ($item->upload->mime_type == "txt" || $item->upload->mime_type == "docx" ||  $item->upload->mime_type == "txt")
                                            <span class="nk-file-icon-type">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                    <g>
                                                        <path d="M49,61H23a5.0147,5.0147,0,0,1-5-5V16a5.0147,5.0147,0,0,1,5-5H40.9091L54,22.1111V56A5.0147,5.0147,0,0,1,49,61Z" style="fill:#e3edfc"></path>
                                                        <path d="M54,22.1111H44.1818a3.3034,3.3034,0,0,1-3.2727-3.3333V11s1.8409.2083,6.9545,4.5833C52.8409,20.0972,54,22.1111,54,22.1111Z" style="fill:#b7d0ea"></path>
                                                        <path d="M19.03,59A4.9835,4.9835,0,0,0,23,61H49a4.9835,4.9835,0,0,0,3.97-2Z" style="fill:#c4dbf2"></path>
                                                        <rect x="27" y="31" width="18" height="2" rx="1" ry="1" style="fill:#599def"></rect>
                                                        <rect x="27" y="36" width="18" height="2" rx="1" ry="1" style="fill:#599def"></rect>
                                                        <rect x="27" y="41" width="18" height="2" rx="1" ry="1" style="fill:#599def"></rect>
                                                        <rect x="27" y="46" width="12" height="2" rx="1" ry="1" style="fill:#599def"></rect>
                                                    </g>
                                                </svg>
                                            </span>
                                        @elseif($item->upload->mime_type == "png" || $item->upload->mime_type == "PNG" || $item->upload->mime_type == "jpg" || $item->upload->mime_type == "JPG" || $item->upload->mime_type == "jpeg" ||  $item->upload->mime_type == "JPEG")
                                            <span class="nk-file-icon-type">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                    <path d="M49,61H23a5.0147,5.0147,0,0,1-5-5V16a5.0147,5.0147,0,0,1,5-5H40.9091L54,22.1111V56A5.0147,5.0147,0,0,1,49,61Z" style="fill:#e3edfc"></path>
                                                    <path d="M54,22.1111H44.1818a3.3034,3.3034,0,0,1-3.2727-3.3333V11s1.8409.2083,6.9545,4.5833C52.8409,20.0972,54,22.1111,54,22.1111Z" style="fill:#b7d0ea"></path>
                                                    <path d="M19.03,59A4.9835,4.9835,0,0,0,23,61H49a4.9835,4.9835,0,0,0,3.97-2Z" style="fill:#c4dbf2"></path>
                                                    <path d="M27.2223,43H44.7086s2.325-.2815.7357-1.897l-5.6034-5.4985s-1.5115-1.7913-3.3357.7933L33.56,40.4707a.6887.6887,0,0,1-1.0186.0486l-1.9-1.6393s-1.3291-1.5866-2.4758,0c-.6561.9079-2.0261,2.8489-2.0261,2.8489S25.4268,43,27.2223,43Z" style="fill:#000000"></path></svg>
                                            </span>

                                        @else
                                            <span class="nk-file-icon-type">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                    <g>
                                                        <rect x="18" y="16" width="36" height="40" rx="5" ry="5" style="fill:#e3edfc"></rect>
                                                        <path d="M19.03,54A4.9835,4.9835,0,0,0,23,56H49a4.9835,4.9835,0,0,0,3.97-2Z" style="fill:#c4dbf2"></path>
                                                        <rect x="32" y="20" width="8" height="2" rx="1" ry="1" style="fill:#7a4d96"></rect>
                                                        <rect x="32" y="25" width="8" height="2" rx="1" ry="1" style="fill:#7a4d96"></rect>
                                                        <rect x="32" y="30" width="8" height="2" rx="1" ry="1" style="fill:#7a4d96"></rect>
                                                        <rect x="32" y="35" width="8" height="2" rx="1" ry="1" style="fill:#7a4d96"></rect>
                                                        <path d="M35,16.0594h2a0,0,0,0,1,0,0V41a1,1,0,0,1-1,1h0a1,1,0,0,1-1-1V16.0594A0,0,0,0,1,35,16.0594Z" style="fill:#7a4d96"></path>
                                                        <path d="M38.0024,40H33.9976A1.9976,1.9976,0,0,0,32,41.9976v2.0047A1.9976,1.9976,0,0,0,33.9976,46h4.0047A1.9976,1.9976,0,0,0,40,44.0024V41.9976A1.9976,1.9976,0,0,0,38.0024,40Zm-.0053,4H34V42h4Z" style="fill:#7a4d96"></path>
                                                    </g>
                                                </svg>
                                            </span>
                                        @endif
                                        </a>
                                    </div>
                                    <div class="nk-file-name">
                                        <div class="nk-file-name-text">
                                            <a href="#" class="title">{{ $item->upload->file_name }}</a>
                                        </div>
                                    </div>
                                </div>
                                <ul class="nk-file-desc">
                                    <li class="date">{{ formatedDate($item->created_at) }}</li>
                                </ul>
                                <ul class="nk-file-desc">
                                    <li class="size">{{ formatedSize($storage) }}</li>
                                    <li class="members">3 Miembros</li>
                                </ul>
                            </div>
                            <div class="nk-file-actions">
                                <div class="dropdown">
                                    <a href="" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <ul class="link-list-plain no-bdr">
                                            @if ($item->upload->mime_type == "mp4" ||  $item->upload->mime_type == "mkv" ||  $item->upload->mime_type == "wmv" ||  $item->upload->mime_type == "flv" ||  $item->upload->mime_type == "mov" ||  $item->upload->mime_type == "avi"  ||  $item->upload->mime_type == "mpeg-4" )
                                                <li>
                                                    <a class="file-video" data-toggle="modal"  data-id="{{ $item->upload->id }}"><em class="icon ni ni-eye"></em><span>Visualizar</span></a>
                                                </li>
                                            @elseif ($item->upload->mime_type == "png" || $item->upload->mime_type == "PNG" || $item->upload->mime_type == "jpg" || $item->upload->mime_type == "JPG" || $item->upload->mime_type == "jpeg" ||  $item->upload->mime_type == "JPEG")
                                                <li><a class="file-image" data-toggle="modal" data-id="{{ $item->upload->id }}"><em class="icon ni ni-eye"></em><span>Visualizar</span></a></li>
                                            @endif
                                            <li><a class="file-details" data-toggle="modal" data-id="{{ $item->upload->id }}"><em class="icon ni ni-eye"></em><span>Detalle</span></a></li>
                                            <li><a class="file-download" class="file-dl-toast" data-id="{{ $item->upload->id }}"><em class="icon ni ni-download"></em><span>Descargar</span></a></li>
                                            @if($item->privilege_id != 3)
                                                <li><a class="file-trash" data-id="{{ $item->upload->id }}"><em class="icon ni ni-trash"></em><span>Eliminar</span></a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .nk-file -->
                    @endforeach                    
                    </div>
                </div><!-- .nk-files -->
            </div><!-- .tab-pane -->
            <div class="tab-pane" id="file-group-share">
                <div class="nk-files nk-files-view-group">
                    <div class="nk-files-head">
                        <div class="nk-file-item">
                            <div class="nk-file-info">
                                <div class="dropdown">
                                    <div class="tb-head dropdown-toggle dropdown-indicator-down" data-toggle="dropdown">Ordenar por</div>
                                    <div class="dropdown-menu dropdown-menu-xs">
                                        <ul class="link-list-opt ui-colored no-bdr">
                                            <li class="opt-head"><span>ORDENAR POR</span></li>
                                            <li><a class="active" href="#"><span>Descendiente</span></a></li>
                                            <li><a href="#"><span>Ascendente</span></a></li>
                                            <li class="divider"></li>
                                            <li class="opt-head"><span>MOSTAR</span></li>
                                            <li><a class="active" href="#"><span>Ordenar por</span></a></li>
                                            <li><a href="#"><span>Nombre</span></a></li>
                                            <li><a href="#"><span>Tamaño</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-file-actions">
                                
                            </div>
                        </div>
                    </div><!-- .nk-files-head -->
                    <div class="nk-files-group">
                        <div class="nk-files-list">
                            
                            @foreach ($shares as $item)
                                <div class="nk-file-item nk-file">
                                    <div class="nk-file-info">
                                        <div class="nk-file-title">
                                            <div class="nk-file-icon">
                                            @if ($item->upload->mime_type == "mp4" ||  $item->upload->mime_type == "mkv" ||  $item->upload->mime_type == "wmv" ||  $item->upload->mime_type == "flv" ||  $item->upload->mime_type == "mov" ||  $item->upload->mime_type == "avi"  ||  $item->upload->mime_type == "mpeg-4")
                                                <span class="nk-file-icon-type">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                        <g>
                                                            <rect x="18" y="16" width="36" height="40" rx="5" ry="5" style="fill:#e3edfc"></rect>
                                                            <path d="M19.03,54A4.9835,4.9835,0,0,0,23,56H49a4.9835,4.9835,0,0,0,3.97-2Z" style="fill:#c4dbf2"></path>
                                                            <rect x="32" y="20" width="8" height="2" rx="1" ry="1" style="fill:#7a4d96"></rect>
                                                            <rect x="32" y="25" width="8" height="2" rx="1" ry="1" style="fill:#7a4d96"></rect>
                                                            <rect x="32" y="30" width="8" height="2" rx="1" ry="1" style="fill:#7a4d96"></rect>
                                                            <rect x="32" y="35" width="8" height="2" rx="1" ry="1" style="fill:#7a4d96"></rect>
                                                            <path d="M35,16.0594h2a0,0,0,0,1,0,0V41a1,1,0,0,1-1,1h0a1,1,0,0,1-1-1V16.0594A0,0,0,0,1,35,16.0594Z" style="fill:#7a4d96"></path>
                                                            <path d="M38.0024,40H33.9976A1.9976,1.9976,0,0,0,32,41.9976v2.0047A1.9976,1.9976,0,0,0,33.9976,46h4.0047A1.9976,1.9976,0,0,0,40,44.0024V41.9976A1.9976,1.9976,0,0,0,38.0024,40Zm-.0053,4H34V42h4Z" style="fill:#7a4d96"></path>
                                                        </g>
                                                    </svg>
                                                </span>
                                            @elseif ($item->upload->mime_type == "xlsx" || $item->upload->mime_type == "xls"  || $item->upload->mime_type == "xlt" || $item->upload->mime_type == "xls" || $item->upload->mime_type == "xml")

                                                <span class="nk-file-icon-type">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                        <path d="M49,61H23a5.0147,5.0147,0,0,1-5-5V16a5.0147,5.0147,0,0,1,5-5H40.9091L54,22.1111V56A5.0147,5.0147,0,0,1,49,61Z" style="fill:#e3edfc"></path>
                                                        <path d="M54,22.1111H44.1818a3.3034,3.3034,0,0,1-3.2727-3.3333V11s1.8409.2083,6.9545,4.5833C52.8409,20.0972,54,22.1111,54,22.1111Z" style="fill:#b7d0ea"></path>
                                                        <path d="M19.03,59A4.9835,4.9835,0,0,0,23,61H49a4.9835,4.9835,0,0,0,3.97-2Z" style="fill:#c4dbf2"></path>
                                                        <path d="M42,31H30a3.0033,3.0033,0,0,0-3,3V45a3.0033,3.0033,0,0,0,3,3H42a3.0033,3.0033,0,0,0,3-3V34A3.0033,3.0033,0,0,0,42,31ZM29,38h6v3H29Zm8,0h6v3H37Zm6-4v2H37V33h5A1.001,1.001,0,0,1,43,34ZM30,33h5v3H29V34A1.001,1.001,0,0,1,30,33ZM29,45V43h6v3H30A1.001,1.001,0,0,1,29,45Zm13,1H37V43h6v2A1.001,1.001,0,0,1,42,46Z" style="fill:#7a4d96"></path></svg>
                                                </span>
                                                
                                            @elseif ($item->upload->mime_type == "psd" || $item->upload->mime_type == "ai")
                                            
                                                <span class="nk-file-icon-type">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                        <path d="M49,61H23a5.0147,5.0147,0,0,1-5-5V16a5.0147,5.0147,0,0,1,5-5H40.9091L54,22.1111V56A5.0147,5.0147,0,0,1,49,61Z" style="fill:#e3edfc"></path>
                                                        <path d="M54,22.1111H44.1818a3.3034,3.3034,0,0,1-3.2727-3.3333V11s1.8409.2083,6.9545,4.5833C52.8409,20.0972,54,22.1111,54,22.1111Z" style="fill:#b7d0ea"></path>
                                                        <path d="M19.03,59A4.9835,4.9835,0,0,0,23,61H49a4.9835,4.9835,0,0,0,3.97-2Z" style="fill:#c4dbf2"></path>
                                                        <path d="M27.2223,43H44.7086s2.325-.2815.7357-1.897l-5.6034-5.4985s-1.5115-1.7913-3.3357.7933L33.56,40.4707a.6887.6887,0,0,1-1.0186.0486l-1.9-1.6393s-1.3291-1.5866-2.4758,0c-.6561.9079-2.0261,2.8489-2.0261,2.8489S25.4268,43,27.2223,43Z" style="fill:#000000"></path></svg>
                                                </span>

                                            @elseif ($item->upload->mime_type == "zip" || $item->upload->mime_type == "rar" )
                                                <span class="nk-file-icon-type">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                        <g>
                                                            <rect x="18" y="16" width="36" height="40" rx="5" ry="5" style="fill:#e3edfc"></rect>
                                                            <path d="M19.03,54A4.9835,4.9835,0,0,0,23,56H49a4.9835,4.9835,0,0,0,3.97-2Z" style="fill:#c4dbf2"></path>
                                                            <rect x="32" y="20" width="8" height="2" rx="1" ry="1" style="fill:#7a4d96"></rect>
                                                            <rect x="32" y="25" width="8" height="2" rx="1" ry="1" style="fill:#7a4d96"></rect>
                                                            <rect x="32" y="30" width="8" height="2" rx="1" ry="1" style="fill:#7a4d96"></rect>
                                                            <rect x="32" y="35" width="8" height="2" rx="1" ry="1" style="fill:#7a4d96"></rect>
                                                            <path d="M35,16.0594h2a0,0,0,0,1,0,0V41a1,1,0,0,1-1,1h0a1,1,0,0,1-1-1V16.0594A0,0,0,0,1,35,16.0594Z" style="fill:#7a4d96"></path>
                                                            <path d="M38.0024,40H33.9976A1.9976,1.9976,0,0,0,32,41.9976v2.0047A1.9976,1.9976,0,0,0,33.9976,46h4.0047A1.9976,1.9976,0,0,0,40,44.0024V41.9976A1.9976,1.9976,0,0,0,38.0024,40Zm-.0053,4H34V42h4Z" style="fill:#7a4d96"></path>
                                                        </g>
                                                    </svg>
                                                </span>
                                            @elseif ($item->upload->mime_type == "txt" || $item->upload->mime_type == "docx" ||  $item->upload->mime_type == "txt")
                                                <span class="nk-file-icon-type">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                        <g>
                                                            <path d="M49,61H23a5.0147,5.0147,0,0,1-5-5V16a5.0147,5.0147,0,0,1,5-5H40.9091L54,22.1111V56A5.0147,5.0147,0,0,1,49,61Z" style="fill:#e3edfc"></path>
                                                            <path d="M54,22.1111H44.1818a3.3034,3.3034,0,0,1-3.2727-3.3333V11s1.8409.2083,6.9545,4.5833C52.8409,20.0972,54,22.1111,54,22.1111Z" style="fill:#b7d0ea"></path>
                                                            <path d="M19.03,59A4.9835,4.9835,0,0,0,23,61H49a4.9835,4.9835,0,0,0,3.97-2Z" style="fill:#c4dbf2"></path>
                                                            <rect x="27" y="31" width="18" height="2" rx="1" ry="1" style="fill:#599def"></rect>
                                                            <rect x="27" y="36" width="18" height="2" rx="1" ry="1" style="fill:#599def"></rect>
                                                            <rect x="27" y="41" width="18" height="2" rx="1" ry="1" style="fill:#599def"></rect>
                                                            <rect x="27" y="46" width="12" height="2" rx="1" ry="1" style="fill:#599def"></rect>
                                                        </g>
                                                    </svg>
                                                </span>
                                            @elseif($item->upload->mime_type == "png" || $item->upload->mime_type == "PNG" || $item->upload->mime_type == "jpg" || $item->upload->mime_type == "JPG" || $item->upload->mime_type == "jpeg" ||  $item->upload->mime_type == "JPEG")
                                                <span class="nk-file-icon-type">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                        <path d="M49,61H23a5.0147,5.0147,0,0,1-5-5V16a5.0147,5.0147,0,0,1,5-5H40.9091L54,22.1111V56A5.0147,5.0147,0,0,1,49,61Z" style="fill:#e3edfc"></path>
                                                        <path d="M54,22.1111H44.1818a3.3034,3.3034,0,0,1-3.2727-3.3333V11s1.8409.2083,6.9545,4.5833C52.8409,20.0972,54,22.1111,54,22.1111Z" style="fill:#b7d0ea"></path>
                                                        <path d="M19.03,59A4.9835,4.9835,0,0,0,23,61H49a4.9835,4.9835,0,0,0,3.97-2Z" style="fill:#c4dbf2"></path>
                                                        <path d="M27.2223,43H44.7086s2.325-.2815.7357-1.897l-5.6034-5.4985s-1.5115-1.7913-3.3357.7933L33.56,40.4707a.6887.6887,0,0,1-1.0186.0486l-1.9-1.6393s-1.3291-1.5866-2.4758,0c-.6561.9079-2.0261,2.8489-2.0261,2.8489S25.4268,43,27.2223,43Z" style="fill:#000000"></path></svg>
                                                </span>

                                            @else
                                                <span class="nk-file-icon-type">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                        <g>
                                                            <rect x="18" y="16" width="36" height="40" rx="5" ry="5" style="fill:#e3edfc"></rect>
                                                            <path d="M19.03,54A4.9835,4.9835,0,0,0,23,56H49a4.9835,4.9835,0,0,0,3.97-2Z" style="fill:#c4dbf2"></path>
                                                            <rect x="32" y="20" width="8" height="2" rx="1" ry="1" style="fill:#7a4d96"></rect>
                                                            <rect x="32" y="25" width="8" height="2" rx="1" ry="1" style="fill:#7a4d96"></rect>
                                                            <rect x="32" y="30" width="8" height="2" rx="1" ry="1" style="fill:#7a4d96"></rect>
                                                            <rect x="32" y="35" width="8" height="2" rx="1" ry="1" style="fill:#7a4d96"></rect>
                                                            <path d="M35,16.0594h2a0,0,0,0,1,0,0V41a1,1,0,0,1-1,1h0a1,1,0,0,1-1-1V16.0594A0,0,0,0,1,35,16.0594Z" style="fill:#7a4d96"></path>
                                                            <path d="M38.0024,40H33.9976A1.9976,1.9976,0,0,0,32,41.9976v2.0047A1.9976,1.9976,0,0,0,33.9976,46h4.0047A1.9976,1.9976,0,0,0,40,44.0024V41.9976A1.9976,1.9976,0,0,0,38.0024,40Zm-.0053,4H34V42h4Z" style="fill:#7a4d96"></path>
                                                        </g>
                                                    </svg>
                                                </span>
                                            @endif
                                            </div>
                                            <div class="nk-file-name">
                                                <div class="nk-file-name-text">
                                                    <a href="#" class="title">{{ $item->upload->name }}</a>
                                                        </div>
                                            </div>
                                        </div>
                                        <ul class="nk-file-desc">
                                            <li class="date">{{ formatedDate($item->created_at) }}</li>
                                            <li class="size">{{ formatedSize($item->upload->size) }}</li>
                                            <li class="members">3 Miembros</li>
                                        </ul>
                                    </div>
                                    <div class="nk-file-actions">
                                        <div class="dropdown">
                                            <a href="" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <ul class="link-list-plain no-bdr">
                                                    @if ($item->upload->mime_type == "mp4" ||  $item->upload->mime_type == "mkv" ||  $item->upload->mime_type == "wmv" ||  $item->upload->mime_type == "flv" ||  $item->upload->mime_type == "mov" ||  $item->upload->mime_type == "avi"  ||  $item->upload->mime_type == "mpeg-4" )
                                                        <li>
                                                            <a class="file-video" data-toggle="modal"  data-id="{{ $item->upload->id }}"><em class="icon ni ni-eye"></em><span>Visualizar</span></a>
                                                        </li>
                                                    @elseif ($item->upload->mime_type == "png" || $item->upload->mime_type == "PNG" || $item->upload->mime_type == "jpg" || $item->upload->mime_type == "JPG" || $item->upload->mime_type == "jpeg" ||  $item->upload->mime_type == "JPEG")
                                                        <li><a class="file-image" data-toggle="modal" data-id="{{ $item->upload->id }}"><em class="icon ni ni-eye"></em><span>Visualizar</span></a></li>
                                                    @endif
                                                    <li><a class="file-details" data-toggle="modal" data-id="{{ $item->upload->id }}"><em class="icon ni ni-eye"></em><span>Detalle</span></a></li>
                                                    <li><a class="file-download" class="file-dl-toast" data-id="{{ $item->upload->id }}"><em class="icon ni ni-download"></em><span>Descargar</span></a></li>
                                                    @if($item->privilege_id != 3)
                                                        <li><a class="file-trash" data-id="{{ $item->upload->id }}"><em class="icon ni ni-trash"></em><span>Eliminar</span></a></li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .nk-file -->
                            @endforeach
                        </div>
                    </div>
                </div><!-- .nk-files -->
            </div><!-- .tab-pane -->
            <div class="tab-pane" id="file-list-share">
                <div class="nk-files nk-files-view-list">
                    <div class="nk-files-head">
                        <div class="nk-file-item">
                            <div class="nk-file-info">
                                <div class="tb-head dropdown-toggle dropdown-indicator-caret" data-toggle="dropdown">Nombre</div>
                                <div class="dropdown-menu dropdown-menu-xs">
                                    <ul class="link-list-opt no-bdr">
                                        <li class="opt-head"><span>ORDENAR POR</span></li>
                                        <li><a href="#"><span>Descendiente</span></a></li>
                                        <li><a href="#"><span>Ascending</span></a></li>
                                    </ul>
                                </div>
                                <div class="tb-head"></div>
                            </div>
                            <div class="nk-file-meta">
                                <div class="dropdown">
                                    <div class="tb-head dropdown-toggle dropdown-indicator-down" data-toggle="dropdown">Ordenar por</div>
                                    <div class="dropdown-menu dropdown-menu-xs">
                                        <ul class="link-list-opt ui-colored no-bdr">
                                            <li class="opt-head"><span>ORDENAR POR</span></li>
                                            <li><a class="active" href="#"><span>Descendiente</span></a></li>
                                            <li><a href="#"><span>Ascending</span></a></li>
                                            <li class="divider"></li>
                                            <li class="opt-head"><span>MOSTAR</span></li>
                                            <li><a class="active" href="#"><span>Ordenar por</span></a></li>
                                            <li><a href="#"><span>Nombre</span></a></li>
                                            <li><a href="#"><span>Tamaño</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-file-members">
                                <div class="tb-head">Miembros</div>
                            </div>
                            <div class="nk-file-actions">
                                <div class="dropdown">
                                    <a href="" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <ul class="link-list-opt no-bdr">
                                            <li><a href="#file-share" data-toggle="modal"><em class="icon ni ni-share"></em><span>Share</span></a></li>
                                            <li><a href="#file-copy" data-toggle="modal"><em class="icon ni ni-copy"></em><span>Copy</span></a></li>
                                            <li><a href="#file-move" data-toggle="modal"><em class="icon ni ni-forward-arrow"></em><span>Move</span></a></li>
                                            <li><a href="#" class="file-dl-toast"><em class="icon ni ni-download"></em><span>Download</span></a></li>
                                            <li><a href="#"><em class="icon ni ni-trash"></em><span>Eliminar</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .nk-files-head -->
                    <div class="nk-files-list">
                        @foreach ($shares as $item)
                            <div class="nk-file-item nk-file">
                                <div class="nk-file-info">
                                    <div class="nk-file-title">
                                        <div class="custom-control custom-control-sm custom-checkbox notext">
                                            <input type="checkbox" class="custom-control-input" id="file-check-n6">
                                            <label class="custom-control-label" for="file-check-n6"></label>
                                        </div>
                                        <div class="nk-file-icon">
                                            @if ($item->upload->mime_type == "mp4" ||  $item->upload->mime_type == "mkv" ||  $item->upload->mime_type == "wmv" ||  $item->upload->mime_type == "flv" ||  $item->upload->mime_type == "mov" ||  $item->upload->mime_type == "avi"  ||  $item->upload->mime_type == "mpeg-4")
                                                <span class="nk-file-icon-type">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                        <g>
                                                            <rect x="18" y="16" width="36" height="40" rx="5" ry="5" style="fill:#e3edfc"></rect>
                                                            <path d="M19.03,54A4.9835,4.9835,0,0,0,23,56H49a4.9835,4.9835,0,0,0,3.97-2Z" style="fill:#c4dbf2"></path>
                                                            <rect x="32" y="20" width="8" height="2" rx="1" ry="1" style="fill:#7a4d96"></rect>
                                                            <rect x="32" y="25" width="8" height="2" rx="1" ry="1" style="fill:#7a4d96"></rect>
                                                            <rect x="32" y="30" width="8" height="2" rx="1" ry="1" style="fill:#7a4d96"></rect>
                                                            <rect x="32" y="35" width="8" height="2" rx="1" ry="1" style="fill:#7a4d96"></rect>
                                                            <path d="M35,16.0594h2a0,0,0,0,1,0,0V41a1,1,0,0,1-1,1h0a1,1,0,0,1-1-1V16.0594A0,0,0,0,1,35,16.0594Z" style="fill:#7a4d96"></path>
                                                            <path d="M38.0024,40H33.9976A1.9976,1.9976,0,0,0,32,41.9976v2.0047A1.9976,1.9976,0,0,0,33.9976,46h4.0047A1.9976,1.9976,0,0,0,40,44.0024V41.9976A1.9976,1.9976,0,0,0,38.0024,40Zm-.0053,4H34V42h4Z" style="fill:#7a4d96"></path>
                                                        </g>
                                                    </svg>
                                                </span>
                                            @elseif ($item->upload->mime_type == "xlsx" || $item->upload->mime_type == "xls"  || $item->upload->mime_type == "xlt" || $item->upload->mime_type == "xls" || $item->upload->mime_type == "xml")

                                                <span class="nk-file-icon-type">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                        <path d="M49,61H23a5.0147,5.0147,0,0,1-5-5V16a5.0147,5.0147,0,0,1,5-5H40.9091L54,22.1111V56A5.0147,5.0147,0,0,1,49,61Z" style="fill:#e3edfc"></path>
                                                        <path d="M54,22.1111H44.1818a3.3034,3.3034,0,0,1-3.2727-3.3333V11s1.8409.2083,6.9545,4.5833C52.8409,20.0972,54,22.1111,54,22.1111Z" style="fill:#b7d0ea"></path>
                                                        <path d="M19.03,59A4.9835,4.9835,0,0,0,23,61H49a4.9835,4.9835,0,0,0,3.97-2Z" style="fill:#c4dbf2"></path>
                                                        <path d="M42,31H30a3.0033,3.0033,0,0,0-3,3V45a3.0033,3.0033,0,0,0,3,3H42a3.0033,3.0033,0,0,0,3-3V34A3.0033,3.0033,0,0,0,42,31ZM29,38h6v3H29Zm8,0h6v3H37Zm6-4v2H37V33h5A1.001,1.001,0,0,1,43,34ZM30,33h5v3H29V34A1.001,1.001,0,0,1,30,33ZM29,45V43h6v3H30A1.001,1.001,0,0,1,29,45Zm13,1H37V43h6v2A1.001,1.001,0,0,1,42,46Z" style="fill:#7a4d96"></path></svg>
                                                </span>
                                                
                                            @elseif ($item->upload->mime_type == "psd" || $item->upload->mime_type == "ai")
                                            
                                                <span class="nk-file-icon-type">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                        <path d="M49,61H23a5.0147,5.0147,0,0,1-5-5V16a5.0147,5.0147,0,0,1,5-5H40.9091L54,22.1111V56A5.0147,5.0147,0,0,1,49,61Z" style="fill:#e3edfc"></path>
                                                        <path d="M54,22.1111H44.1818a3.3034,3.3034,0,0,1-3.2727-3.3333V11s1.8409.2083,6.9545,4.5833C52.8409,20.0972,54,22.1111,54,22.1111Z" style="fill:#b7d0ea"></path>
                                                        <path d="M19.03,59A4.9835,4.9835,0,0,0,23,61H49a4.9835,4.9835,0,0,0,3.97-2Z" style="fill:#c4dbf2"></path>
                                                        <path d="M27.2223,43H44.7086s2.325-.2815.7357-1.897l-5.6034-5.4985s-1.5115-1.7913-3.3357.7933L33.56,40.4707a.6887.6887,0,0,1-1.0186.0486l-1.9-1.6393s-1.3291-1.5866-2.4758,0c-.6561.9079-2.0261,2.8489-2.0261,2.8489S25.4268,43,27.2223,43Z" style="fill:#000000"></path></svg>
                                                </span>

                                            @elseif ($item->upload->mime_type == "zip" || $item->upload->mime_type == "rar" )
                                                <span class="nk-file-icon-type">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                        <g>
                                                            <rect x="18" y="16" width="36" height="40" rx="5" ry="5" style="fill:#e3edfc"></rect>
                                                            <path d="M19.03,54A4.9835,4.9835,0,0,0,23,56H49a4.9835,4.9835,0,0,0,3.97-2Z" style="fill:#c4dbf2"></path>
                                                            <rect x="32" y="20" width="8" height="2" rx="1" ry="1" style="fill:#7a4d96"></rect>
                                                            <rect x="32" y="25" width="8" height="2" rx="1" ry="1" style="fill:#7a4d96"></rect>
                                                            <rect x="32" y="30" width="8" height="2" rx="1" ry="1" style="fill:#7a4d96"></rect>
                                                            <rect x="32" y="35" width="8" height="2" rx="1" ry="1" style="fill:#7a4d96"></rect>
                                                            <path d="M35,16.0594h2a0,0,0,0,1,0,0V41a1,1,0,0,1-1,1h0a1,1,0,0,1-1-1V16.0594A0,0,0,0,1,35,16.0594Z" style="fill:#7a4d96"></path>
                                                            <path d="M38.0024,40H33.9976A1.9976,1.9976,0,0,0,32,41.9976v2.0047A1.9976,1.9976,0,0,0,33.9976,46h4.0047A1.9976,1.9976,0,0,0,40,44.0024V41.9976A1.9976,1.9976,0,0,0,38.0024,40Zm-.0053,4H34V42h4Z" style="fill:#7a4d96"></path>
                                                        </g>
                                                    </svg>
                                                </span>
                                            @elseif ($item->upload->mime_type == "txt" || $item->upload->mime_type == "docx" ||  $item->upload->mime_type == "txt")
                                                <span class="nk-file-icon-type">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                        <g>
                                                            <path d="M49,61H23a5.0147,5.0147,0,0,1-5-5V16a5.0147,5.0147,0,0,1,5-5H40.9091L54,22.1111V56A5.0147,5.0147,0,0,1,49,61Z" style="fill:#e3edfc"></path>
                                                            <path d="M54,22.1111H44.1818a3.3034,3.3034,0,0,1-3.2727-3.3333V11s1.8409.2083,6.9545,4.5833C52.8409,20.0972,54,22.1111,54,22.1111Z" style="fill:#b7d0ea"></path>
                                                            <path d="M19.03,59A4.9835,4.9835,0,0,0,23,61H49a4.9835,4.9835,0,0,0,3.97-2Z" style="fill:#c4dbf2"></path>
                                                            <rect x="27" y="31" width="18" height="2" rx="1" ry="1" style="fill:#599def"></rect>
                                                            <rect x="27" y="36" width="18" height="2" rx="1" ry="1" style="fill:#599def"></rect>
                                                            <rect x="27" y="41" width="18" height="2" rx="1" ry="1" style="fill:#599def"></rect>
                                                            <rect x="27" y="46" width="12" height="2" rx="1" ry="1" style="fill:#599def"></rect>
                                                        </g>
                                                    </svg>
                                                </span>
                                            @elseif($item->upload->mime_type == "png" || $item->upload->mime_type == "PNG" || $item->upload->mime_type == "jpg" || $item->upload->mime_type == "JPG" || $item->upload->mime_type == "jpeg" ||  $item->upload->mime_type == "JPEG")
                                                <span class="nk-file-icon-type">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                        <path d="M49,61H23a5.0147,5.0147,0,0,1-5-5V16a5.0147,5.0147,0,0,1,5-5H40.9091L54,22.1111V56A5.0147,5.0147,0,0,1,49,61Z" style="fill:#e3edfc"></path>
                                                        <path d="M54,22.1111H44.1818a3.3034,3.3034,0,0,1-3.2727-3.3333V11s1.8409.2083,6.9545,4.5833C52.8409,20.0972,54,22.1111,54,22.1111Z" style="fill:#b7d0ea"></path>
                                                        <path d="M19.03,59A4.9835,4.9835,0,0,0,23,61H49a4.9835,4.9835,0,0,0,3.97-2Z" style="fill:#c4dbf2"></path>
                                                        <path d="M27.2223,43H44.7086s2.325-.2815.7357-1.897l-5.6034-5.4985s-1.5115-1.7913-3.3357.7933L33.56,40.4707a.6887.6887,0,0,1-1.0186.0486l-1.9-1.6393s-1.3291-1.5866-2.4758,0c-.6561.9079-2.0261,2.8489-2.0261,2.8489S25.4268,43,27.2223,43Z" style="fill:#000000"></path></svg>
                                                </span>

                                            @else
                                                <span class="nk-file-icon-type">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                                                        <g>
                                                            <rect x="18" y="16" width="36" height="40" rx="5" ry="5" style="fill:#e3edfc"></rect>
                                                            <path d="M19.03,54A4.9835,4.9835,0,0,0,23,56H49a4.9835,4.9835,0,0,0,3.97-2Z" style="fill:#c4dbf2"></path>
                                                            <rect x="32" y="20" width="8" height="2" rx="1" ry="1" style="fill:#7a4d96"></rect>
                                                            <rect x="32" y="25" width="8" height="2" rx="1" ry="1" style="fill:#7a4d96"></rect>
                                                            <rect x="32" y="30" width="8" height="2" rx="1" ry="1" style="fill:#7a4d96"></rect>
                                                            <rect x="32" y="35" width="8" height="2" rx="1" ry="1" style="fill:#7a4d96"></rect>
                                                            <path d="M35,16.0594h2a0,0,0,0,1,0,0V41a1,1,0,0,1-1,1h0a1,1,0,0,1-1-1V16.0594A0,0,0,0,1,35,16.0594Z" style="fill:#7a4d96"></path>
                                                            <path d="M38.0024,40H33.9976A1.9976,1.9976,0,0,0,32,41.9976v2.0047A1.9976,1.9976,0,0,0,33.9976,46h4.0047A1.9976,1.9976,0,0,0,40,44.0024V41.9976A1.9976,1.9976,0,0,0,38.0024,40Zm-.0053,4H34V42h4Z" style="fill:#7a4d96"></path>
                                                        </g>
                                                    </svg>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="nk-file-name">
                                            <div class="nk-file-name-text">
                                                <a href="#" class="title">{{ $item->upload->file_name }}</a>
                                                <div class="nk-file-star asterisk"><a href="#">
                                                    <em class="asterisk-off icon ni ni-star"></em><em class="asterisk-on icon ni ni-star-fill"></em></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-file-meta">
                                    <div class="tb-lead">{{ formatedDate($item->created_at) }}</div>
                                </div>
                                <div class="nk-file-members">
                                    @if(count($item->upload->share)>=1)
                                        <div class="nk-file-members">
                                            <div class="user-avatar-group">
                                                @foreach($item->upload->share->take(3) as $user)
                                                    <div class="user-avatar xs bg-purple">
                                                        <span>{{ substr($user->firstname, 0, 1) }}{{substr($user->lastname, 0, 1) }}</span>
                                                    </div>
                                                @endforeach
                                                
                                                <div class="user-avatar xs bg-light">
                                                    <span>+{{ count($item->upload->share) }}</span>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    @else
                                        <div class="tb-lead">Sólo yo</div>
                                    @endif
                                    <div class="tb-shared"><em class="ni ni-link" data-toggle="tooltip" data-placement="left" title="" data-original-title="People with the link can view"></em></div>
                                </div>
                                <div class="nk-file-actions">
                                    <div class="dropdown">
                                        <a href="" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <ul class="link-list-plain no-bdr">
                                                @if ($item->upload->mime_type == "mp4" ||  $item->upload->mime_type == "mkv" ||  $item->upload->mime_type == "wmv" ||  $item->upload->mime_type == "flv" ||  $item->upload->mime_type == "mov" ||  $item->upload->mime_type == "avi"  ||  $item->upload->mime_type == "mpeg-4" )
                                                    <li>
                                                        <a class="file-video" data-toggle="modal"  data-id="{{ $item->upload->id }}"><em class="icon ni ni-eye"></em><span>Visualizar</span></a>
                                                    </li>
                                                @elseif ($item->upload->mime_type == "png" || $item->upload->mime_type == "PNG" || $item->upload->mime_type == "jpg" || $item->upload->mime_type == "JPG" || $item->upload->mime_type == "jpeg" ||  $item->upload->mime_type == "JPEG")
                                                    <li><a class="file-image" data-toggle="modal" data-id="{{ $item->upload->id }}"><em class="icon ni ni-eye"></em><span>Visualizar</span></a></li>
                                                @endif
                                                <li><a class="file-details" data-toggle="modal" data-id="{{ $item->upload->id }}"><em class="icon ni ni-eye"></em><span>Detalle</span></a></li>
                                                <li><a class="file-download" class="file-dl-toast" data-id="{{ $item->upload->id }}"><em class="icon ni ni-download"></em><span>Descargar</span></a></li>
                                                @if($item->privilege_id != 3)
                                                    <li><a class="file-trash" data-id="{{ $item->upload->id }}"><em class="icon ni ni-trash"></em><span>Eliminar</span></a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .nk-file -->
                        @endforeach
                    </div>
                </div><!-- .nk-files -->
            </div><!-- .tab-pane -->
        </div><!-- .tab-content -->
    </div>
@endif


<script src="{{ asset('/js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/bootstrap.js') }}" type="text/javascript"></script>

<script  type="text/javascript">
         
   $(document).ready(function() {

     
     $("#add-share").on("click",function(e){
             alert("add-share");
             var upload =  $(this).attr("data-id");
            addShare(upload);
     });
             
     function addShare(upload) {
                     
            var user = $('#users').val();
            var privilege = $('#privileges').val();
            var project = $('#project').val();

            $.ajax({
               url: '/customers/uploads/modal/share/store',
               type: "POST",
               datatype: "html",
               data: {
                  _token: $('meta[name=csrf-token]').attr('content'),
                  user : user,
                  privilege : privilege,
                  project : project,
                  upload : upload,
               },
               success: function(data) {
                  $('#file-share').modal('hide'); 
               },
               error: function(jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                        alert('Internal error: ' + jqXHR.responseText);
                  }else{
                        alert('Unexpected error.');
                  }
               }
            });

      }

   });

</script>
