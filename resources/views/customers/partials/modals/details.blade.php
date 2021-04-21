<div class="modal fade" tabindex="-1" role="dialog" id="file-details">
    <div class="modal-dialog modal-md" role="document">
       <div class="modal-content">
          <div class="modal-header align-center">
             <div class="nk-file-title">
                <div class="nk-file-icon">
                  @if ($upload->mime_type == "mp4" ||  $upload->mime_type == "mkv" ||  $upload->mime_type == "wmv" ||  $upload->mime_type == "flv" ||  $upload->mime_type == "mov" ||  $upload->mime_type == "avi"  ||  $upload->mime_type == "mpeg-4")
                                                
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
                  @elseif ($upload->mime_type == "xlsx" || $upload->mime_type == "xls"  || $upload->mime_type == "xlt" || $upload->mime_type == "xls" || $upload->mime_type == "xml")

                     <span class="nk-file-icon-type">
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                              <path d="M49,61H23a5.0147,5.0147,0,0,1-5-5V16a5.0147,5.0147,0,0,1,5-5H40.9091L54,22.1111V56A5.0147,5.0147,0,0,1,49,61Z" style="fill:#e3edfc"></path>
                              <path d="M54,22.1111H44.1818a3.3034,3.3034,0,0,1-3.2727-3.3333V11s1.8409.2083,6.9545,4.5833C52.8409,20.0972,54,22.1111,54,22.1111Z" style="fill:#b7d0ea"></path>
                              <path d="M19.03,59A4.9835,4.9835,0,0,0,23,61H49a4.9835,4.9835,0,0,0,3.97-2Z" style="fill:#c4dbf2"></path>
                              <path d="M42,31H30a3.0033,3.0033,0,0,0-3,3V45a3.0033,3.0033,0,0,0,3,3H42a3.0033,3.0033,0,0,0,3-3V34A3.0033,3.0033,0,0,0,42,31ZM29,38h6v3H29Zm8,0h6v3H37Zm6-4v2H37V33h5A1.001,1.001,0,0,1,43,34ZM30,33h5v3H29V34A1.001,1.001,0,0,1,30,33ZM29,45V43h6v3H30A1.001,1.001,0,0,1,29,45Zm13,1H37V43h6v2A1.001,1.001,0,0,1,42,46Z" style="fill:#7a4d96"></path></svg>
                     </span>
                     
                  @elseif ($upload->mime_type == "psd" || $upload->mime_type == "ai")
                  
                     <span class="nk-file-icon-type">
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 72 72">
                              <path d="M49,61H23a5.0147,5.0147,0,0,1-5-5V16a5.0147,5.0147,0,0,1,5-5H40.9091L54,22.1111V56A5.0147,5.0147,0,0,1,49,61Z" style="fill:#e3edfc"></path>
                              <path d="M54,22.1111H44.1818a3.3034,3.3034,0,0,1-3.2727-3.3333V11s1.8409.2083,6.9545,4.5833C52.8409,20.0972,54,22.1111,54,22.1111Z" style="fill:#b7d0ea"></path>
                              <path d="M19.03,59A4.9835,4.9835,0,0,0,23,61H49a4.9835,4.9835,0,0,0,3.97-2Z" style="fill:#c4dbf2"></path>
                              <path d="M27.2223,43H44.7086s2.325-.2815.7357-1.897l-5.6034-5.4985s-1.5115-1.7913-3.3357.7933L33.56,40.4707a.6887.6887,0,0,1-1.0186.0486l-1.9-1.6393s-1.3291-1.5866-2.4758,0c-.6561.9079-2.0261,2.8489-2.0261,2.8489S25.4268,43,27.2223,43Z" style="fill:#000000"></path></svg>
                     </span>

                  @elseif ($upload->mime_type == "zip" || $upload->mime_type == "rar" )
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
                  @elseif ($upload->mime_type == "txt" || $upload->mime_type == "docx" ||  $upload->mime_type == "txt")
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
                  @elseif($upload->mime_type == "png" || $upload->mime_type == "PNG" || $upload->mime_type == "jpg" || $upload->mime_type == "JPG" || $upload->mime_type == "jpeg" ||  $upload->mime_type == "JPEG")
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
                   <div class="nk-file-name-text"><span class="title">{{ $upload->file_name }}</span></div>
                   <div class="nk-file-name-sub">Proyecto</div>
                </div>
             </div>
             <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
          </div>
          <div class="modal-body">
             <div class="nk-file-details">
                <div class="nk-file-details-row">
                   <div class="nk-file-details-col">Tipo</div>
                   <div class="nk-file-details-col">{{ $upload->mime_type }}</div>
                </div>
                <div class="nk-file-details-row">
                   <div class="nk-file-details-col">Tamaño</div>
                   <div class="nk-file-details-col">{{ formatedSize($upload->size) }}</div>
                </div>
                <div class="nk-file-details-row">
                   <div class="nk-file-details-col">Location</div>
                   <div class="nk-file-details-col">
                      <ul class="breadcrumb breadcrumb-sm breadcrumb-alt breadcrumb-arrow">
                         <li class="breadcrumb-item">Poroyectos</li>
                         <li class="breadcrumb-item">{{ $upload->project->title }}</li>
                      </ul>
                   </div>
                </div>
                <div class="nk-file-details-row">
                   <div class="nk-file-details-col">Dueño</div>
                   <div class="nk-file-details-col">{{ $upload->user->firstname }} {{ $upload->user->lastname }}</div>
                </div>
                <div class="nk-file-details-row">
                   <div class="nk-file-details-col">Shared with</div>
                   <div class="nk-file-details-col">
                      <div class="user-avatar-group">
                        @if(count($upload->share)>=1)
                        <div class="nk-file-members">
                            <div class="user-avatar-group">
                                @foreach($upload->share->take(3) as $user)
                                    <div class="user-avatar xs bg-purple">
                                        <span>{{ substr($user->firstname, 0, 1) }}{{substr($user->lastname, 0, 1) }}</span>
                                    </div>
                                @endforeach
                                
                                <div class="user-avatar xs bg-light">
                                    <span>+{{ count($upload->share) }}</span>
                                </div>
                                
                            </div>
                        </div>
                    @else
                        <div class="tb-lead">Sólo yo</div>
                    @endif
                      </div>
                   </div>
                </div>
                <div class="nk-file-details-row">
                   <div class="nk-file-details-col">Modificado</div>
                   <div class="nk-file-details-col">{{ formatedDate($upload->updated_at) }}</div>
                </div>
                <div class="nk-file-details-row">
                   <div class="nk-file-details-col">Creado</div>
                   <div class="nk-file-details-col">{{ formatedDate($upload->created_at) }}</div>
                </div>
             </div>
          </div>
          <div class="modal-footer modal-footer-stretch bg-light">
             
          </div>
       </div>
    </div>
 </div>

@push('scripts')

<script src="{{ asset('/js/files.js') }}" type="text/javascript"></script>

@endpush