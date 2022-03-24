def convert_to_decimal(num):
    roman_number_map = {"I": "1", "V": "5", "X": "10", "L": "50", "C": "100", "D": "500", "M": "1000"}
    return int(roman_number_map[num])


def is_greater(num1, num2):
    return convert_to_decimal(num1) > convert_to_decimal(num2)


class Solution:

    def romanToInt(self, roman_number: str) -> int:
        decimal_number = convert_to_decimal(roman_number[len(roman_number) - 1])

        for i in range(len(roman_number) - 1, 0, -1):
            if is_greater(roman_number[i], roman_number[i - 1]):
                decimal_number -= convert_to_decimal(roman_number[i - 1])
            else:
                decimal_number += convert_to_decimal(roman_number[i - 1])

        return decimal_number
