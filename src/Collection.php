<?php
/**
 * Encapsulates an array.
Queue functions:
	array_push				O(∑ var_i, for all i)
	array_pop 				O(1)
	array_shift 			O(n) - it has to reindex all the keys
	array_unshift 			O(n + ∑ var_i, for all i) - it has to reindex all the keys
Array Intersection, Union, Subtraction:
	array_intersect_key		if intersection 100% do O(Max(param_i_size)*∑param_i_count, for all i), if intersection 0% intersect O(∑param_i_size, for all i)
	array_intersect			if intersection 100% do O(n^2*∑param_i_count, for all i), if intersection 0% intersect O(n^2)
	array_intersect_assoc	if intersection 100% do O(Max(param_i_size)*∑param_i_count, for all i), if intersection 0% intersect O(∑param_i_size, for all i)
	array_diff 				O(π param_i_size, for all i) - That's product of all the param_sizes
	array_diff_key			O(∑ param_i_size, for i != 1) - this is because we don't need to iterate over the first array.
	array_merge				O( ∑ array_i, i != 1 ) - doesn't need to iterate over the first array
	+ (union) 				O(n), where n is size of the 2nd array (ie array_first + array_second) - less overhead than array_merge since it doesn't have to renumber
	array_replace O( ∑ array_i, for all i )
Random:
	shuffle O(n)
	array_rand O(n) - Requires a linear poll.
Obvious Big-O:
	array_fill 				O(n)
	array_fill_keys 		O(n)
	range 					O(n)
	array_splice 			O(offset + length)
	array_slice 			O(offset + length) or O(n) if length = NULL
	array_keys 				O(n)
	array_values 			O(n)
	array_reverse 			O(n)
	array_pad 				O(pad_size)
	array_flip 				O(n)
	array_sum 				O(n)
	array_product 			O(n)
	array_reduce 			O(n)
	array_filter 			O(n)
	array_map 				O(n)
	array_chunk 			O(n)
	array_combine			O(n)
 */
interface Collection {
	public function clear();
	public function isEmpty();
	public function size();	
	public function containsValue($mixValue);
	public function removeValue($mixValue);
}