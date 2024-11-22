package com.example.mindtec;

import android.os.Bundle;

import androidx.fragment.app.Fragment;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;

import com.bumptech.glide.Glide;
import com.bumptech.glide.request.RequestOptions;
import com.example.mindtec.databinding.FragmentHomeBinding;
import com.example.mindtec.databinding.FragmentPerfilBinding;

public class PerfilFragment extends Fragment {
    private FragmentPerfilBinding binding;
    ImageView imageView;
    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {

        binding = FragmentPerfilBinding.inflate(inflater, container, false);
        View root = binding.getRoot();
        imageView = root.findViewById(R.id.imageView2);
        Glide.with(this)
                .load(R.drawable.logo)
                .apply(RequestOptions.circleCropTransform())
                .into(imageView);
        return inflater.inflate(R.layout.fragment_perfil, container, false);

    }
}