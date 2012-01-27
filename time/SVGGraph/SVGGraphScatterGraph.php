<?php
/**
 * Copyright (C) 2010-2011 Graham Breach
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
/**
 * For more information, please contact <graham@goat1000.com>
 */

require_once('SVGGraphPointGraph.php');

/**
 * ScatterGraph - points with axes and grid
 */
class ScatterGraph extends PointGraph {

	protected $scatter_2d = false;

	public function Draw()
	{
		$assoc = !$this->scatter_2d && $this->AssociativeKeys();
		$this->CalcAxes($assoc);
		$body = $this->Grid();
		$values = $this->GetValues();

		// a scatter graph without markers is empty!
		if($this->marker_size == 0)
			$this->marker_size = 1;

		$bnum = 0;
		foreach($values as $key => $value) {
			if($this->scatter_2d && is_array($value)) {
				$key = $value[0];
				$value = $value[1];
			}
			$point_pos = $this->GridPosition($key, $bnum);
			if(!is_null($value) && !is_null($point_pos)) {
				$x = $point_pos;
				$y = $this->height - $this->pad_bottom - $this->y0 - ($value * $this->bar_unit_height);

				$this->AddMarker($x, $y, $key, $value);
			}
			++$bnum;
		}

		$body .= $this->Axes();
		$body .= $this->CrossHairs();
		$body .= $this->DrawMarkers();
		return $body;
	}

	/**
	 * Sets up values array
	 */
	public function Values($values)
	{
		if(!$this->scatter_2d)
			return parent::Values($values);

		$this->values = array();
		$v = func_get_args();
		if(count($v) == 1)
			$v = $v[0];
		if(is_array($v) && isset($v[0]) && is_array($v[0]) && is_array($v[0][0]))
			$this->values = $v;
		elseif(is_array($v) && isset($v[0]) && is_array($v[0]))
			$this->values[0] = $v;
		else
			throw new Exception('Scatter 2D mode requires array of array(x,y) points');
	}

	/**
	 * Checks that the data produces a 2-D plot
	 */
	protected function CheckValues(&$values)
	{
		parent::CheckValues($values);
		foreach($values[0] as $key => $v) {
			if(is_numeric($key) && $key > 0)
				return;
		}

		throw new Exception('No valid data keys for scatter graph');
	}

	/**
	 * Overload GetMaxValue to support scatter_2d data
	 */
	protected function GetMaxValue()
	{
		if(!$this->scatter_2d)
			return parent::GetMaxValue();

		function vmax($m,$e) {
			if(is_null($m))
				return $e[1];
			return $e[1] > $m ? $e[1] : $m;
		}
		return array_reduce($this->values[0], 'vmax', null);
	}

	/**
	 * Overload GetMinValue to support scatter_2d data
	 */
	protected function GetMinValue()
	{
		if(!$this->scatter_2d)
			return parent::GetMinValue();

		function vmin($m,$e) {
			if(is_null($m))
				return $e[1];
			return $e[1] < $m ? $e[1] : $m;
		}
		return array_reduce($this->values[0], 'vmin', null);
	}

	/**
	 * Overload GetMaxKey to support scatter_2d data
	 */
	protected function GetMaxKey()
	{
		if(!$this->scatter_2d)
			return parent::GetMaxKey();

		function kmax($m,$e) {
			if(is_null($m))
				return $e[0];
			return $e[0] > $m ? $e[0] : $m;
		}
		return array_reduce($this->values[0], 'kmax', null);
	}

	/**
	 * Overload GetMinKey to support scatter_2d data
	 */
	protected function GetMinKey()
	{
		if(!$this->scatter_2d)
			return parent::GetMinKey();

		function kmin($m,$e) {
			if(is_null($m))
				return $e[0];
			return $e[0] < $m ? $e[0] : $m;
		}
		return array_reduce($this->values[0], 'kmin', null);
	}

}

