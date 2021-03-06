import React from "react";

interface TextInputProps extends React.InputHTMLAttributes<HTMLInputElement> {
  label?: string;
  name: string;
  errors: string[];
}

const TextInput = ({
  label, name, errors = [], ...rest
}: TextInputProps) => (
  <div className="w-full mb-3">
    {label && (
    <label
      className="block text-sm leading-5 font-medium text-gray-700 mb-2"
      htmlFor={name}
    >
      {label}
    </label>
    )}
    <input
      className={`form-input transition duration-150 ease-in-out ${errors.length ? `border-red-500` : ``}`}
      id={name}
      name={name}
      {...rest}
    />
    {errors && <p className="text-red-500 text-xs mt-2">{errors[0]}</p>}
  </div>
);

export default TextInput;
