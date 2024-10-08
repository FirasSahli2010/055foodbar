<div class="tab-pane fade" id="v-pills-reserveren" role="tabpanel"
                                aria-labelledby="v-pills-reserveren-tab">
                                <div class="fp_dashboard_body">
                                    <h3>Reserveren lijst</h3>
                                    <div class="fp_dashboard_order">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr class="t_header">
                                                        <th>Nummer</th>
                                                        <th>Reserveren-nummer</th>
                                                        <th>Datum / Tijd</th>
                                                        <th>Aantaal-person</th>
                                                        <th>Status</th>
                                                    </tr>
                                                    {{--  Reserveren  --}}
                                                    @foreach ($reserveren as $item)

                                                    <tr>
                                                        <td>
                                                            <h5>{{ ++$loop->index }}</h5>
                                                        </td>
                                                        <td>
                                                            <p>{{ $item->reservation_id}}</p>
                                                        </td>
                                                        <td>
                                                            <p>{{ $item->date}}<br>
                                                                 {{ $item->time }}</p>
                                                        </td>

                                                        <td>
                                                            <p>{{ $item->persons}}</p>
                                                        </td>
                                                        <td>
                                                            @if($item->status === 'pending')
                                                            <span class="active">Pending</span>
                                                            @elseif ($item->status === 'approve')
                                                            <span class="active">approve</span>
                                                            @elseif ($item->status === 'complete')
                                                            <span class="complete">Complete</span>
                                                            @elseif ($item->status === 'cancel')
                                                            <span class="cancel">Cancel</span>
                                                            @endif
                                                        </td>

                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="fp__invoice">
                                        <a class="go_back"><i class="fas fa-long-arrow-alt-left"></i> go back</a>
                                        <div class="fp__track_order">
                                            <ul>
                                                <li class="active">order pending</li>
                                                <li>order accept</li>
                                                <li>order process</li>
                                                <li>on the way</li>
                                                <li>Completed</li>
                                            </ul>
                                        </div>
                                        <div class="fp__invoice_header">
                                            <div class="header_address">
                                                <h4>invoice to</h4>
                                                <p>7232 Broadway Suite 308, Jackson Heights, 11372, NY, United
                                                    States</p>
                                                <p>+1347-430-9510</p>
                                            </div>
                                            <div class="header_address">
                                                <p><b>invoice no: </b><span>4574</span></p>
                                                <p><b>Order ID:</b> <span> #4789546458</span></p>
                                                <p><b>date:</b> <span>10-11-2022</span></p>
                                            </div>
                                        </div>
                                        <div class="fp__invoice_body">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <tbody>
                                                        <tr class="border_none">
                                                            <th class="sl_no">SL</th>
                                                            <th class="package">item description</th>
                                                            <th class="price">Price</th>
                                                            <th class="qnty">Quantity</th>
                                                            <th class="total">Total</th>
                                                        </tr>
                                                        <tr>
                                                            <td class="sl_no">01</td>
                                                            <td class="package">
                                                                <p>Hyderabadi Biryani</p>
                                                                <span class="size">small</span>
                                                                <span class="coca_cola">coca-cola</span>
                                                                <span class="coca_cola2">7up</span>
                                                            </td>
                                                            <td class="price">
                                                                <b>$120</b>
                                                            </td>
                                                            <td class="qnty">
                                                                <b>2</b>
                                                            </td>
                                                            <td class="total">
                                                                <b>$240</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="sl_no">02</td>
                                                            <td class="package">
                                                                <p>Daria Shevtsova</p>
                                                                <span class="size">medium</span>
                                                                <span class="coca_cola">coca-cola</span>
                                                            </td>
                                                            <td class="price">
                                                                <b>$120</b>
                                                            </td>
                                                            <td class="qnty">
                                                                <b>2</b>
                                                            </td>
                                                            <td class="total">
                                                                <b>$240</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="sl_no">03</td>
                                                            <td class="package">
                                                                <p>Hyderabadi Biryani</p>
                                                                <span class="size">large</span>
                                                                <span class="coca_cola2">7up</span>
                                                            </td>
                                                            <td class="price">
                                                                <b>$120</b>
                                                            </td>
                                                            <td class="qnty">
                                                                <b>2</b>
                                                            </td>
                                                            <td class="total">
                                                                <b>$240</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="sl_no">04</td>
                                                            <td class="package">
                                                                <p>Hyderabadi Biryani</p>
                                                                <span class="size">medium</span>
                                                                <span class="coca_cola">coca-cola</span>
                                                                <span class="coca_cola2">7up</span>
                                                            </td>
                                                            <td class="price">
                                                                <b>$120</b>
                                                            </td>
                                                            <td class="qnty">
                                                                <b>2</b>
                                                            </td>
                                                            <td class="total">
                                                                <b>$240</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="sl_no">05</td>
                                                            <td class="package">
                                                                <p>Daria Shevtsova</p>
                                                                <span class="size">large</span>
                                                            </td>
                                                            <td class="price">
                                                                <b>$120</b>
                                                            </td>
                                                            <td class="qnty">
                                                                <b>2</b>
                                                            </td>
                                                            <td class="total">
                                                                <b>$240</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="sl_no">04</td>
                                                            <td class="package">
                                                                <p>Hyderabadi Biryani</p>
                                                                <span class="size">medium</span>
                                                                <span class="coca_cola">coca-cola</span>
                                                                <span class="coca_cola2">7up</span>
                                                            </td>
                                                            <td class="price">
                                                                <b>$120</b>
                                                            </td>
                                                            <td class="qnty">
                                                                <b>2</b>
                                                            </td>
                                                            <td class="total">
                                                                <b>$240</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="sl_no">04</td>
                                                            <td class="package">
                                                                <p>Hyderabadi Biryani</p>
                                                                <span class="size">medium</span>
                                                                <span class="coca_cola">coca-cola</span>
                                                                <span class="coca_cola2">7up</span>
                                                            </td>
                                                            <td class="price">
                                                                <b>$120</b>
                                                            </td>
                                                            <td class="qnty">
                                                                <b>2</b>
                                                            </td>
                                                            <td class="total">
                                                                <b>$240</b>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td class="package" colspan="3">
                                                                <b>sub total</b>
                                                            </td>
                                                            <td class="qnty">
                                                                <b>12</b>
                                                            </td>
                                                            <td class="total">
                                                                <b>$755</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="package coupon" colspan="3">
                                                                <b>(-) Discount coupon</b>
                                                            </td>
                                                            <td class="qnty">
                                                                <b></b>
                                                            </td>
                                                            <td class="total coupon">
                                                                <b>$0.00</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="package coast" colspan="3">
                                                                <b>(+) Shipping Cost</b>
                                                            </td>
                                                            <td class="qnty">
                                                                <b></b>
                                                            </td>
                                                            <td class="total coast">
                                                                <b>$10.00</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="package" colspan="3">
                                                                <b>Total Paid</b>
                                                            </td>
                                                            <td class="qnty">
                                                                <b></b>
                                                            </td>
                                                            <td class="total">
                                                                <b>$765</b>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                        <a class="print_btn common_btn" href="#"><i class="far fa-print"></i> print
                                            PDF</a>

                                    </div>
                                </div>
                            </div>
