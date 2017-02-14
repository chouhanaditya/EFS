@extends('layouts.app')
@section('content')
    <h1>Portfolio Summary </h1>
	
	
	<div class="container">	
	<h2>Customer </h2>

        <table class="table table-striped table-bordered table-hover">
			<tbody>
            <tr class="bg-info">
            <tr>
                <td>Name</td>
                <td><?php echo ($customer['name']); ?></td>
            </tr>
            <tr>
                <td>Cust Number</td>
                <td><?php echo ($customer['cust_number']); ?></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><?php echo ($customer['address']); ?></td>
            </tr>
            <tr>
                <td>City </td>
                <td><?php echo ($customer['city']); ?></td>
            </tr>
            <tr>
                <td>State</td>
                <td><?php echo ($customer['state']); ?></td>
            </tr>
            <tr>
                <td>Zip </td>
                <td><?php echo ($customer['zip']); ?></td>
            </tr>
            <tr>
                <td>Home Phone</td>
                <td><?php echo ($customer['home_phone']); ?></td>
            </tr>
            <tr>
                <td>Cell Phone</td>
                <td><?php echo ($customer['cell_phone']); ?></td>
            </tr>


            </tbody>
            
			</tbody>
        </table>
    </div>
	
	<?php
    $stotal_Initial = 0;
    $stotal_Current = 0;
    ?>
	
	<div class="container">	
	<br>
	<h2>Stocks </h2>

        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr class="bg-info">
                <th>Symbol </th>
                <th>Stock Name</th>
                <th>No. of Shares</th>
                <th>Purchase Price</th>
                <th>Purchase Date</th>
				<th>Original Value</th>
                <th>Current Price</th>
                <th>Current Value</th>
               </tr>
            </thead>
            <tbody>
                @foreach($customer->stocks as $stock)
                    <tr>
                        <td>{{ $stock->symbol }}</td>
                        <td>{{ $stock->name }}</td>
                        <td>{{ $stock->shares }}</td>
                        <td><?php echo '$'. $stock->purchase_price ?></td>
                        <td>{{ $stock->purchased }}</td>
                        <td> <?php echo '$'. $stock['shares']*$stock['purchase_price'];
                            $stotal_Initial = $stotal_Initial + $stock['shares'] * $stock['purchase_price']?>
                        </td>
                       <?php
                        $URL="http://finance.google.com/finance/info?client=ig&q=" . $stock->symbol;
                        $File = fopen("$URL", "r");
                        $var = "";
                        do {
                        $data = fread($File, 500);
                        $var .= $data;
                        } while (strlen($data) != 0);

                        $json = str_replace("\n", "", $var);
                        $data = substr($json, 4, strlen($json) - 5);
                        $json_output = json_decode($data, true);
                        $current_value = "\n" . $json_output['l'];
                        ?>
                        <td><?php echo '$', $current_value ?></td>
                        <td> <?php echo '$'. $stock['shares']*$current_value;
                            $stotal_Current = $stotal_Current + $stock['shares'] * $current_value ?>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
		<h5>
            <?php echo 'Initial Total of Stock Portfolio : $' , number_format($stotal_Initial,2) ; ?>
        </h5>
        <h5>
            <?php echo 'Current Total of Stock Portfolio : $' , number_format($stotal_Current,2) ; ?>
        </h5>
    </div>
		
	<?php
	$itotal_initial = 0;
    $itotal_current=0;
    ?>
<br>
	<div class="container">	
	<h2>Investments </h2>
            <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr class="bg-info">
                <th>Category </th>
                <th>Description</th>
                <th>Acquired Value ($)</th>
                <th>Acquired Date</th>
                <th>Recent Value ($)</th>
				<th>Recent Date</th>
               </tr>
            </thead>
            <tbody>
                @foreach($customer->investments as $investment)
                    <tr>
                        <td>{{ $investment->category }}</td>
                        <td>{{ $investment->description }}</td>
                        <td>{{ $investment->acquired_value }}
						<?php $itotal_initial = $itotal_initial + $investment['acquired_value'] ?>
						</td>
                        <td>{{ $investment->acquired_date }}</td>
                        <td>{{ $investment->recent_value }}
						<?php
                        $itotal_current = $itotal_current + $investment['recent_value']
                        ?>
						</td>
						
                        <td>{{ $investment->recent_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
		
		<h5>
            <?php echo 'Initial Total of Investment Portfolio : $' ,number_format( $itotal_initial,2); ?>
            <br>
			<br>
            <?php echo 'Current Total of Investment Portfolio : $' ,number_format( $itotal_current,2); ?>
        </h5>
    </div>
	
	<?php
    $mInitial_Total = 0;
    $mCurrent_Total = 0;
	$initialportfolio=0;
	$currentportfolio=0;
	
    ?>
	
	<div class="container">	
	<br>
	<h2>Mutual Funds </h2>

        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr class="bg-info">
                <th>Mutual Fund Symbol</th>            
                <th>Mutual Fund Name</th>
                <th>Number of units</th>
                <th>Purchase Price</th>
                <th>Purchase Date</th>
				<th>Original Value </th>
                <th>Current Price</th>
                <th>Current Value</th>
               </tr>
            </thead>
            <tbody>
                @foreach($customer->mutualfunds as $mutualfunds)
                    <tr>
                        <td>{{ $mutualfunds->symbol }}</td>
                        <td>{{ $mutualfunds->name }}</td>
                        <td>{{ $mutualfunds->units }}</td>
                        <td><?php echo '$'. $mutualfunds->purchase_price ?></td>
                        <td>{{ $mutualfunds->purchased }}</td>
                        <td> <?php echo '$'. $mutualfunds['units']*$mutualfunds['purchase_price'];
                            $mInitial_Total = $mInitial_Total + $mutualfunds['units'] * $mutualfunds['purchase_price']?>
                        </td>
                        <?php
                        $URL="http://finance.google.com/finance/info?client=ig&q=" . $mutualfunds->symbol;
                        $File = fopen("$URL", "r");
                        $var = "";
                        do {
                        $data = fread($File, 500);
                        $var .= $data;
                        } while (strlen($data) != 0);

                        $json = str_replace("\n", "", $var);
                        $data = substr($json, 4, strlen($json) - 5);
                        $json_output = json_decode($data, true);
                        $current_value = "\n" . $json_output['l'];
                        ?>
                        <td><?php echo '$', $current_value ?></td>
                        <td> <?php echo '$'. $mutualfunds['units']*$current_value;
                            $mCurrent_Total = $mCurrent_Total + $mutualfunds['units'] * $current_value ?>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
		<h5>
            <?php echo 'Initial Total of Mutual funds Portfolio : $' , number_format($mInitial_Total,2) ; ?>
        </h5>
        <h5>
            <?php echo 'Current Total of Mutual funds Portfolio : $' , number_format($mCurrent_Total,2) ; ?>
        </h5>
	<br>
	<br>
	<div class="table table-striped table-bordered table-hover">
	 
     <h4> <?php echo ($customer['name']); ?> - Portfolio </h4>
	 	
		<br>
		<?php $initialportfolio = $itotal_initial+$stotal_Initial+$mInitial_Total;
        $currentportfolio = $itotal_current+$stotal_Current+$mCurrent_Total;
        ?>
		
		
			<?php echo 'Total of Initial Portfolio : $' , number_format($initialportfolio,2); ?>
        
		<br>
		<br>
		
			<?php echo 'Total of Current Portfolio : $' , number_format($currentportfolio,2); ?>
		
		</div>

</div>
	
	
	@stop


